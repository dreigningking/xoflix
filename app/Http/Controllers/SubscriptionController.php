<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use App\Models\Plan;
use App\Models\Panel;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
        $expired = Subscription::whereNotNull('start_at')->where('end_at', '<', now())->count();
        $ongoing = Subscription::whereNotNull('start_at')->where('end_at', '>', now())->count();
        $subscriptions = Subscription::whereNotNull('start_at')->where('user_id', '!=', null);
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
        return view('admin.subscriptions', compact('subscriptions','links','panels','hide_expired', 'name', 'total', 'expired', 'ongoing', 'pendings'));
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
        // dd($request->all());
        $subscription = Subscription::find($request->subscription_id);
        $subscription->username = $request->username;
        $subscription->password = $request->password;
        $subscription->m3u_link = $request->m3u_link;
        $subscription->link_id = $request->link_id;
        $subscription->panel_id = $request->panel_id;
        $subscription->start_at = now();
        $subscription->end_at = now()->addMonths($subscription->duration);
        $subscription->save();
        // dd($subscription->link->url);
        $subscription->user->notify(new SubscriptionActiveNotification($subscription));
        return redirect()->back();
    }

    // public function update_subscription(Request $request)
    // {
    //     // dd($request->all());
    //     $subscription = Subscription::where('id', $request->subscription_id)->first();
    //     // dd($subscription);
    //     switch($request->action){ 
    //         case 'update':  
    //             if($request->username) $subscription->username = $request->username;
    //             if($request->password) $subscription->password = $request->password;
    //             if($request->link_id) $subscription->link_id = $request->link_id;
    //             if($request->panel_id) $subscription->panel_id = $request->panel_id;
    //             if($request->m3u_link) $subscription->m3u_link = $request->m3u_link;
    //             $subscription->save();
    //             return $request->expectsJson() ? response()->json(200) : redirect()->back();
    //             break;
    //         case 'delete': 
    //             $subscription->delete();
    //             return redirect()->back();
    //             break;
    //     }  
        
    // }


    public function trials_store(Request $request)
    {
        // dd($req
        Trial::create(['username' => $request->username, 'password' => $request->password,'m3u_link'=> $request->m3u_link , 'link_id' => $request->link_id, 'panel_id' => $request->panel_id]);

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
                return $request->expectsJson() ? response()->json(200) : redirect()->back();
                break;
            case 'delete': 
                $trial->delete();
                return redirect()->back();
                break;
        }  
        
    }

    

    public function share_to_affilate(Request $request)
    {
        Trial::whereIn('id', $request->trials)->update(['affiliate_id' => $request->user_id]);
        return response()->json(200);
    }

    /* User side */
    public function pricing()
    {
        $plans = Plan::all();
        return view('pricing', compact('plans'));
    }

    public function buy(Request $request)
    {
        //dd($request->all());
        
        if(!auth()->check()){
            if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('login');
            }
        }
        $user = auth()->user();
        $amount = array_sum($request->premium_amount) + array_sum($request->standard_amount);
        $payment = Payment::create(['reference' => uniqid(), 'user_id' => $user->id, 'amount' => $amount ]);
        if($request->has('premium_quantity')){
            foreach(array_filter($request->premium_quantity) as $key => $quantity){
                for($i = 0;$i < $quantity;$i++){
                    Subscription::create(['plan_id'=> 1,'user_id'=> $user->id,'duration'=> $request->premium_duration[$key], 'payment_id'=> $payment->id]);
                }
            }
        }
        if($request->has('standard_quantity')){
            foreach(array_filter($request->standard_quantity) as $key => $quantity){
                for($i = 0;$i < $quantity;$i++){
                    Subscription::create(['plan_id'=> 2,'user_id'=> $user->id,'duration'=> $request->standard_duration[$key], 'payment_id'=> $payment->id]);
                }
            }
        }
        $response = $this->initiateFlutterWave($payment);
        if (!$response)
            return redirect()->back()->with(['flash_message' => 'Service Unavailable, Please Try Again Shortly', 'flash_type' => 'danger']);
        else return redirect()->to($response);
    }

    public function renew(Request $request){
        $subscription = Subscription::find($request->subscription_id);
        $price = Arr::first($subscription->plan->prices, function ($value, $key) use($subscription) {
            return intval($value['label']) == $subscription->duration;
        });
        $payment = Payment::create(['reference' => uniqid(), 'user_id' => $subscription->user_id, 'amount' => $price['description'] ]);
        $subscription->payment_id = $payment->id;
        $subscription->save();
        $response = $this->initiateFlutterWave($payment);
        if (!$response)
            return redirect()->back()->with(['flash_message' => 'Service Unavailable, Please Try Again Shortly', 'flash_type' => 'danger']);
        else return redirect()->to($response);
    }
}