<?php

namespace App\Http\Controllers;

use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Traits\FlutterwaveTrait;

class SubscriptionController extends Controller
{
    use FlutterwaveTrait;
    
    public function index()
    {
        $show_expired = false;
        $name = false;

        $total = Subscription::count();
        $expired = Subscription::where('end_at','<',now())->count();
        $ongoing = Subscription::where('end_at','>',now())->count();
        $new = Payment::whereDoesntHave('subscriptions')->count();

        $subscriptions = Subscription::where('user_id','!=',null);
        if(request()->expired){
            $show_expired = true;
            $subscriptions = $subscriptions->where('end_at','>',now());
        }
        
        if(request()->query() && request()->query('name')){
            $name = request()->query('name');
            $payments = $subscriptions->whereHas('user',function($query) use($name){ 
                    $query->where('firstname','LIKE',"%$name%")->orWhere('lastname','LIKE',"%$name%");
                });
        }
        $subscriptions = $subscriptions->paginate(50);
        
        return view('admin.subscriptions',compact('subscriptions','show_expired','name','total','expired','ongoing','new'));
    }

    public function trials()
    {
        //dd(request()->all());
        $type = ['xtream','m3u_plus'];
        $expired = false;
        $shared = false;
        $assigned = false;
        $trials = Trial::where('link','!=',null);
        if(request()->type){
            $type = request()->type;
            $trials = $trials->whereIn('type',$type);
        }
        
        if(request()->expired){
            $expired = true;
        }else{
            $trials = $trials->where('created_at','>',now()->subHours(6));
        }
        if(request()->shared){
            $shared = true;
        }else{
            $trials = $trials->whereNull('affiliate_id');
        }
        if($assigned = request()->assigned){
            $assigned = true;
        }else{
            $trials = $trials->whereNull('user_id');
        }
        $trials = $trials->paginate(20);
        $total = Trial::count();
        $expired = Trial::where('created_at','<',now()->subHours(6))->count();
        $ongoing = Trial::where('created_at','>',now()->subHours(6))->count();
        $available = Trial::whereNull('user_id')->whereNull('affiliate_id')->count();
        return view('admin.trials',compact('trials','total','expired','ongoing','available','type','shared','assigned'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $payment = Payment::find($request->payment_id);
        $subscription = Subscription::create(['user_id'=> $payment->user_id,'payment_id'=> $payment->id,'m3u_link'=> $request->m3u_link,
        'xtream_username'=> $request->username,'xtream_password'=> $request->password,'xtream_link'=> $request->xtream_link,
        'start_at'=> now(),'end_at'=> $request->end_at]);
        return redirect()->back();
    }

    public function trials_store(Request $request)
    {
        foreach (explode(PHP_EOL,$request->trials) as $trial) {
            //dd($trial);
            if(Str::contains($trial, 'username')){
                $text = explode('?',$trial)[1];
                $values = explode('&',$text);
                $link = $trial;
                foreach($values as $value){
                    if(Str::contains($value, 'username')){
                        $username = explode('=',$value)[1];
                    }elseif(Str::contains($value,'password')){
                        $password = explode('=',$value)[1];
                    }elseif(Str::contains($value, 'type')){
                        $type = explode('=',$value)[1];
                    }
                } 
            }else{
                $link = explode(',',$trial)[0];
                $username = explode(',',$trial)[1];
                $password = explode(',',$trial)[2];
                $type = 'xtream'; 
            }
            Trial::create(['username'=> $username,'password'=> $password,'link'=> $link,'type'=> $type]);
        }
        return redirect()->back();
    }

    public function assign_trial(Request $request)
    {
        
        Trial::where('id',$request->trial_id)->update(['user_id'=> $request->user_id]);
        return $request->expectsJson() ? response()->json(200) : redirect()->back();
    }

    public function share_to_affilate(Request $request)
    {
        Trial::whereIn('id',$request->trials)->update(['affiliate_id'=> $request->user_id]);
        return response()->json(200);
    }

    public function pricing(){
        $settings = Setting::all();
        $one = $settings->firstWhere('name','subscription_1month')->value;
        $three = $settings->firstWhere('name','subscription_3month')->value;
        $six = $settings->firstWhere('name','subscription_6month')->value;
        $twelve = $settings->firstWhere('name','subscription_12month')->value;
        return view('pricing',compact('one','three','six','twelve'));

    }

    public function buy(Request $request) {
        
        $user = auth()->user();
        $settings = Setting::all();
        $amount = $settings->firstWhere('name',"subscription_".$request->duration."month")->value;
        $payment = Payment::create(['reference'=> uniqid(),'user_id'=> $user->id,
        'amount' => $amount,'duration' => $request->duration]);
        $response = $this->initiateFlutterWave($payment);
        if(!$response)
        return redirect()->back()->with(['flash_message'=> 'Service Unavailable, Please Try Again Shortly','flash_type'=> 'danger']);
        else return redirect()->to($response);    
    } 

}
