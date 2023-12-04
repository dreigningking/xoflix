<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use App\Models\Plan;
use App\Models\Panel;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Activity;
use Illuminate\Support\Arr;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\FlutterwaveTrait;
use App\Notifications\SubscriptionActiveNotification;

class SubscriptionController extends Controller
{
    use FlutterwaveTrait;

    public function index()
    {
        $hide_expired = false;
        $name = false;

        $total = Subscription::whereNotNull('start_at')->count();
        $expired = Subscription::expired()->count();
        $subscriptions = Subscription::whereNotNull('start_at')->whereNotNull('user_id');
        if ($hide_expired = request()->expired) {
            $subscriptions = $subscriptions->where('end_at', '>', now());
        }

        if (request()->query() && request()->query('name')) {
            $name = request()->query('name');
            $subscriptions = $subscriptions->whereHas('user', function ($query) use ($name) {
                $query->where('firstname', 'LIKE', "%$name%")->orWhere('lastname', 'LIKE', "%$name%");
            });
        }
        $subscriptions = $subscriptions->paginate(50);
        $links = Link::all();
        $panels = Panel::all();
        $pendings = Subscription::whereHas('payment',function($query){
            $query->where('status','success'); })->whereNull('start_at')->with(['user','plan'])->get();
        return view('admin.subscriptions', compact('subscriptions','links','panels','hide_expired', 'name', 'total', 'expired','pendings'));
    }

    public function trials()
    {
        //dd(request()->all());
        $expiry = false;
        $shared = false;
        $assigned = false;
        $trials = Trial::where('link_id', '!=', null);
        if ($expiry = request()->expiry) {
            $trials = $trials->where('created_at','>', now()->subHours(6));
        } 
        if ($shared = request()->shared) {
            $trials = $trials->whereNull('affiliate_id');
        } 
        if ($assigned = request()->assigned) {
            $trials = $trials->whereNull('user_id');
        }
        $trials = $trials->paginate(20);
        $total = Trial::count();
        $expired = Trial::where('created_at', '<', now()->subHours(6))->count();
        $ongoing = Trial::where('created_at', '>', now()->subHours(6))->count();
        $available = Trial::whereNull('user_id')->whereNull('affiliate_id')->count();
        $links = Link::all();
        $panels = Panel::all();
        return view('admin.trials', compact('trials','links','panels', 'total','expired', 'ongoing', 'available', 'expiry','shared', 'assigned'));
    }

    public function store(Request $request)
    {
        $subscription = Subscription::find($request->subscription_id);
        $subscription->username = $request->username;
        $subscription->password = $request->password;
        $subscription->m3u_link = $request->m3u_link;
        $subscription->link_id = $request->link_id;
        $subscription->panel_id = $request->panel_id;
        if(!$subscription->start_at) $subscription->start_at =  now();
        $subscription->end_at = $subscription->end_at ? $subscription->end_at->addDays($request->days) : now()->addDays($request->days);
        $subscription->plan_id = $request->plan_id;
        $subscription->save();
        $subscription->payment->sub_status = true;
        $subscription->payment->save();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin updated subscription']);
        $subscription->user->notify(new SubscriptionActiveNotification($subscription));
        return redirect()->back();
    }



    public function trials_store(Request $request)
    {
        // dd($req
        Trial::create(['username' => $request->username, 'password' => $request->password,'m3u_link'=> $request->m3u_link , 'link_id' => $request->link_id, 'panel_id' => $request->panel_id]);
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin created Trial']);
        return redirect()->back();
    }

    public function update_trial(Request $request)
    {
        //dd($request->all());
        $trial = Trial::where('id', $request->trial_id)->first();
        switch($request->action){ 
            case 'update':  
                if($request->user_id) {
                    $trial->user_id = $request->user_id;
                    $trial->created_at = now();
                }
                if($request->username) $trial->user_id = $request->user_id;
                if($request->password) $trial->password = $request->password;
                if($request->link_id) $trial->link_id = $request->link_id;
                if($request->panel_id) $trial->panel_id = $request->panel_id;
                if($request->m3u_link) $trial->m3u_link = $request->m3u_link;
                $trial->save();
                Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin updated trial']);
                return $request->expectsJson() ? response()->json(200) : redirect()->back();
                break;
            case 'delete': 
                $trial->delete();
                Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin deleted trial']);
                return redirect()->back();
                break;
        }  
        
    }

    

    public function share_to_affilate(Request $request)
    {
        Trial::whereIn('id', $request->trials)->update(['affiliate_id' => $request->user_id]);
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin shared trial to affiliate']);
        return response()->json(200);
    }

    /* User side */
    public function pricing()
    {
        $plans = Plan::all();
        $discounts = Setting::whereIn('name',['discount3','discount6','discount12'])->select('name','value')->get();
        return view('pricing', compact('plans','discounts'));
    }

    public function subscriptions(){
        $user = auth()->user();
        return view('user.subscription',compact('user'));
    }

    public function buy(Request $request)
    {
        // dd($request->all());
        
        if(!auth()->check()){
            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('login');
            }
        }
        $user = auth()->user();
        $plan = Plan::find($request->plan_id);
        $amount = $plan->price * $request->duration * $request->connections;
        $discountedAmount = $this->getDiscountedAmount($request->duration,$amount);
        $subscription = Subscription::create(['plan_id'=> $request->plan_id,'user_id'=> $user->id, 'connections'=> $request->connections]);
        $payment = Payment::create(['reference' => uniqid(), 'user_id' => $user->id, 'amount' => $discountedAmount,'duration'=> $request->duration,'description'=> 'new','subscription_id'=> $subscription->id]);
        return redirect()->route('subscription.payment',$payment);
        // $response = $this->initiateFlutterWave($payment);
        // if (!$response)
        //     return redirect()->back()->with(['flash_message' => 'Service Unavailable, Please Try Again Shortly', 'flash_type' => 'danger']);
        // else return redirect()->to($response);
    }

    public function renew(Request $request){
        $subscription = Subscription::find($request->subscription_id);
        $plan = Plan::find($subscription->plan_id);
        $amount = $plan->price * $request->duration * $subscription->connections;
        $discountedAmount = $this->getDiscountedAmount($request->duration,$amount);
        $payment = Payment::create(['reference' => uniqid(), 'user_id' => $subscription->user_id, 'amount' => $discountedAmount,'duration'=> $request->duration,'description'=> $request->description,'subscription_id'=> $subscription->id ]);
        return redirect()->route('subscription.payment',$payment);
        
    }

    
    public function payment(Payment $payment){
        $settings = Setting::all();
        $bank = $settings->firstWhere('name','bank_name')->value;
        $account_number = $settings->firstWhere('name','account_number')->value;
        $account_name = $settings->firstWhere('name','account_name')->value;
        return view('invoice',compact('payment','bank','account_number','account_name'));
    }

    public function getDiscountedAmount($duration,$amount){
        $discounts = Setting::whereIn('name',['discount3','discount6','discount12'])->select('name','value')->get();
        if($duration >= 12){
            $discount = $discounts->firstWhere('name','discount12')->value;
            return (100 - $discount) * $amount / 100;
        }else if($duration >= 6){
            $discount = $discounts->firstWhere('name','discount6')->value;
            return (100 - $discount) * $amount / 100;
        }else if($duration >=3){
            $discount = $discounts->firstWhere('name','discount3')->value;
            return (100 - $discount) * $amount / 100;
        }else{
            return $amount;
        }
    }
}