<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Webhook;
use Illuminate\Http\Request;
use App\Jobs\WebhookExecutionJob;

use App\Http\Traits\FlutterwaveTrait;

class PaymentController extends Controller
{
    use FlutterwaveTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sortBy = null;
        $status = null;
        $name = null;
        $payments = Payment::whereNotNull('user_id');
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
        if(request()->query() && request()->query('from_date')){
            $from_date = request()->query('from_date');
            $payments = $payments->where('created_at','>=',$from_date);
        }
        if(request()->query() && request()->query('to_date')){
            $to_date = request()->query('to_date');
            $payments = $payments->where('created_at','<=',$to_date);
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
        $thisToday = Payment::where('status','success')->whereDay('created_at',now()->format('d'))->sum('amount');
        $thisWeek = Payment::where('status','success')->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('amount');
        $thisMonth = Payment::where('status','success')->whereMonth('created_at',now()->format('m'))->sum('amount');
        $thisYear = Payment::where('status','success')->whereMonth('created_at',now()->format('Y'))->sum('amount');
        return view('admin.payments',compact('payments','status','name','sortBy','thisToday','thisWeek','thisMonth','thisYear'));
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
        return redirect()->route('home')->with(['result'=> 0,'message'=> 'Payment was not successful. Please try again']);
        $reference = request()->query('tx_ref');
        $payment = Payment::where('reference',$reference)->first();
        //if payment was already successful before now
        if(!$payment || $payment->status == 'success' || $payment->user_id != $user->id){
            \abort(404);
        }
        $details = $this->verifyFlutterWavePayment($payment->reference);
        // dd($details);
        if(!$details || !$details->status || $details->status != 'success' || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
            return redirect()->route('home')->with(['result'=> 0,'message'=> 'Payment was not successful. Please try again']);
        }
        $payment->status = 'success';
        $payment->method = $details->data->payment_type;
        $payment->save();
        return redirect()->route('dashboard')->with(['result'=>1,'message'=> 'Payment Successful']);
       
    }

    
    public function webhook(Request $request){   
        $result = $request->getContent();
        $webhook = Webhook::create(['service'=> 'flutterwave','body'=> $result]);
        WebhookExecutionJob::dispatch($webhook)->delay(now()->addMinutes(5));
        return response()->json(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
