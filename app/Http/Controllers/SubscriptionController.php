<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
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
        $show_expired = false;
        $name = false;

        $total = Subscription::whereNotNull('start_at')->count();
        $expired = Subscription::whereNotNull('start_at')->where('end_at', '<', now())->count();
        $ongoing = Subscription::whereNotNull('start_at')->where('end_at', '>', now())->count();
        $new = Payment::whereDoesntHave('subscriptions')->count();

        $subscriptions = Subscription::whereNotNull('start_at')->where('user_id', '!=', null);
        if (request()->expired) {
            $show_expired = true;
            $subscriptions = $subscriptions->where('end_at', '>', now());
        }

        if (request()->query() && request()->query('name')) {
            $name = request()->query('name');
            $payments = $subscriptions->whereHas('user', function ($query) use ($name) {
                $query->where('firstname', 'LIKE', "%$name%")->orWhere('lastname', 'LIKE', "%$name%");
            });
        }
        $subscriptions = $subscriptions->paginate(50);

        return view('admin.subscriptions', compact('subscriptions', 'show_expired', 'name', 'total', 'expired', 'ongoing', 'new'));
    }

    public function trials()
    {
        //dd(request()->all());
        $type = ['xtream', 'm3u_plus'];
        $expired = false;
        $shared = false;
        $assigned = false;
        $trials = Trial::where('link', '!=', null);
        if (request()->type) {
            $type = request()->type;
            $trials = $trials->whereIn('type', $type);
        }

        if (request()->expired) {
            $expired = true;
        } else {
            $trials = $trials->where('created_at', '>', now()->subHours(6));
        }
        if (request()->shared) {
            $shared = true;
        } else {
            $trials = $trials->whereNull('affiliate_id');
        }
        if ($assigned = request()->assigned) {
            $assigned = true;
        } else {
            $trials = $trials->whereNull('user_id');
        }
        $trials = $trials->paginate(20);
        $total = Trial::count();
        $expired = Trial::where('created_at', '<', now()->subHours(6))->count();
        $ongoing = Trial::where('created_at', '>', now()->subHours(6))->count();
        $available = Trial::whereNull('user_id')->whereNull('affiliate_id')->count();
        return view('admin.trials', compact('trials', 'total', 'expired', 'ongoing', 'available', 'type', 'shared', 'assigned'));
    }

    public function store(Request $request)
    {
        Subscription::where('id',$request->subscription_id)->update([
            'm3u_link' => $request->m3u_link, 'xtream_username' => $request->username, 'xtream_password' => $request->password, 'xtream_link' => $request->xtream_link,
            'start_at' => now(), 'end_at' => Carbon::createFromFormat('m/d/Y h:i A',$request->end_at)
        ]);
        $subscription = Subscription::find($request->subscription_id);
        $subscription->user->notify(new SubscriptionActiveNotification($subscription));
        return redirect()->back();
    }

    public function trials_store(Request $request)
    {
        // dd($request->all());
        for ($i = 0; $i < count($request->link); $i++) {
            // Trial::create(['username'=> $request->input("username.$i"),'password'=> $request->input("password.$i"),'link'=> $request->input("link.$i"),'type'=> $request->input("username.$i") ? 'xtream': 'm3u_plus']);
            if (Str::contains($request->input("link.$i"), 'username')) {
                $text = explode('?', $request->input("link.$i"))[1];
                $values = explode('&', $text);
                $link = $request->input("link.$i");
                foreach ($values as $value) {
                    if (Str::contains($value, 'username')) {
                        $username = explode('=', $value)[1];
                    } elseif (Str::contains($value, 'password')) {
                        $password = explode('=', $value)[1];
                    } elseif (Str::contains($value, 'type')) {
                        $type = explode('=', $value)[1];
                    }
                }
            } else {
                $link = $request->input("link.$i");
                $username = $request->input("username.$i");
                $password = $request->input("password.$i");
                $type = 'xtream';
            }
            Trial::create(['username' => $username, 'password' => $password, 'link' => $link, 'type' => $type]);
        }

        return redirect()->back();
    }

    public function assign_trial(Request $request)
    {
        Trial::where('id', $request->trial_id)->update(['user_id' => $request->user_id]);
        return $request->expectsJson() ? response()->json(200) : redirect()->back();
    }

    public function share_to_affilate(Request $request)
    {
        Trial::whereIn('id', $request->trials)->update(['affiliate_id' => $request->user_id]);
        return response()->json(200);
    }

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
}
