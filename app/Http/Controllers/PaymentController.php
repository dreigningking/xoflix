<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use App\Models\Panel;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Webhook;
use App\Models\Activity;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Jobs\WebhookExecutionJob;
use App\Http\Traits\FlutterwaveTrait;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SubscriptionPaymentNotification;

class PaymentController extends Controller
{
    use FlutterwaveTrait;

    public function index(){
        
        $sortBy = null;
        $status = null;
        $name = null;
        $payments = Payment::whereNotNull('user_id')->orderBy('created_at','desc');
        if(request()->query() && request()->query('status')){
            $status = request()->query('status');
            $payments = $payments->where('status',strtolower($status));
        }

        if(request()->query() && request()->query('name')){
            $name = request()->query('name');
            $payments = $payments->whereHas('user',function($query) use($name){ 
                    $query->where('firstname','LIKE',"%$name%")->orWhere('lastname','LIKE',"%$name%");
                });
        }
        
        if(request()->query() && request()->query('sortBy')){
            $sortBy = request()->query('sortBy');
            if(request()->query('sortBy') == 'date_asc'){
                $payments = $payments->orderBy('created_at','asc');
            }
            if(request()->query('sortBy') == 'date_desc'){
                $payments = $payments->orderBy('created_at','desc');
            }
            
        }
        $payments = $payments->paginate(50);
        $links = Link::all();
        $panels = Panel::all();
        $thisToday = Payment::where('status','success')->whereDay('created_at',now()->format('d'))->sum('amount');
        $thisWeek = Payment::where('status','success')->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('amount');
        $thisMonth = Payment::where('status','success')->whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->sum('amount');
        $thisYear = Payment::where('status','success')->whereBetween('created_at',[Carbon::now()->startOfYear(),Carbon::now()->endOfYear()])->sum('amount');
        return view('admin.payments',compact('payments','status','name','sortBy','thisToday','thisWeek','thisMonth','thisYear','links','panels'));
    }
    
    public function resolve_account(Request $request)
    {
        $this->resolveBankAccountByFlutter($request->bank_code,$request->account_number);
    }

    
    public function paymentcallback(){        
        $user = auth()->user();
        if(!request()->query('tx_ref')) 
        \abort(404);
        if(request()->query('status') != 'successful') 
        return redirect()->route('dashboard')->with(['result'=> 0,'message'=> 'Payment was not successful. Please try again']);
        $reference = request()->query('tx_ref');
        $payment = Payment::where('reference',$reference)->first();
        //if payment was already successful before now
        if(!$payment || $payment->status == 'success' || $payment->user_id != $user->id){
            \abort(404);
        }
        $details = $this->verifyFlutterWavePayment($payment->reference);
        // dd($details);
        if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
            return redirect()->route('dashboard')->with(['result'=> 0,'message'=> 'Payment was not successful. Please try again']);
        }
        $payment->status = 'success';
        $payment->method = $details->data->payment_type;
        $payment->save();
        return redirect()->route('dashboard')->with(['result'=>1,'message'=> 'Payment Successful']);
       
    }

    
    public function webhook(Request $request){   
        $result = $request->getContent();
        $webhook = Webhook::create(['service'=> 'flutterwave','body'=> $result]);
        return response()->json(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $link = Setting::where('name','payment_redirection')->first();
        $payment = Payment::find($request->payment_id);
        if($payment->upload) Storage::delete('public/payments',$payment->upload);
        $image = time().'.'.$request->file('upload')->getClientOriginalExtension();
        $request->file('upload')->storeAs('public/payments',$image);
        $payment->upload = $image;
        $payment->method = 'transfer/ussd';
        $payment->status = 'paid';
        $payment->save();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'User uploaded payment proof','objectable_id'=> $payment->id,'objectable_type'=> get_class($payment)]);
        if($link->value){
            return redirect()->to($link->value);
        }

        return redirect()->route('dashboard');
    }

    
    public function confirmation(Request $request){
        $payment = Payment::find($request->payment_id);
        $payment->status = 'success';
        $payment->save();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin confirmed payment','objectable_id'=> $payment->id,'objectable_type'=> get_class($payment)]);
        return redirect()->back();
    }

    public function destroy(Request $request){
        $payment = Payment::where('id',$request->payment_id)->delete();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin deleted payment']);
        return redirect()->back();
    }

}
