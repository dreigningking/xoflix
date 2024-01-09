<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Link;
use App\Models\Plan;
use App\Models\User;
use App\Models\Panel;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Activity;
use App\Models\Withdrawal;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = auth()->user();
        if($user->role == 'user')
        return redirect()->route('dashboard');

        $thisMonthUsers = User::where('role','user')->whereMonth('created_at',now()->format('m'))->count();
        $thisMonthPayments = Payment::whereMonth('created_at',now()->format('m'))->get();
        $withdrawals = Withdrawal::orderBy('created_at','desc')->get();
        
        $totalActive = Subscription::whereNotNull('start_at')->where('start_at', '<', now())->where('end_at','>',now())->count();
        $today = Subscription::whereNotNull('start_at')->whereDay('end_at',now()->format('d'))->count();
        $thisWeek = Subscription::whereNotNull('start_at')->whereBetween('end_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();
        $thisMonth = Subscription::whereNotNull('start_at')->whereMonth('end_at',now()->format('m'))->count();
        $availableTrials = Trial::whereNull('user_id')->whereNull('affiliate_id')->count();
        return view('admin.dashboard',compact('thisMonthUsers','thisMonthPayments','withdrawals','totalActive','today','thisWeek','thisMonth','availableTrials'));
    }

    

    
    public function notifications()
    {
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $notifications = $user->notifications();
        return view('admin.notifications',compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activities()
    {
        $activities = Activity::orderBy('created_at','desc')->paginate(50);
        return view('admin.activities',compact('activities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $settings = Setting::all();
        $panels = Panel::all();
        return view('admin.settings',compact('settings','panels'));
    }

    

    
    public function updateSettings(Request $request)
    {
        
        foreach($request->except('_token') as $key => $value){
            if($key == 'feature_image'){
                if($request->hasFile('feature_image')){
                    $featured_image = Setting::where('name','feature_image')->first()->value;
                    if($featured_image) Storage::delete('public/',$featured_image);
                    $image = time().'.'.$request->file('feature_image')->getClientOriginalExtension();
                    $request->file('feature_image')->storeAs('public/',$image);
                    Setting::where('name',$key)->update(['value'=> $image]);
                }
            }else{
                Setting::where('name',$key)->update(['value'=> $value]);
            }
            
        }
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Settings']);
        return redirect()->back();
    }


    public function panels(Request $request){
        switch($request->action){
            case 'create':  Panel::create(['name'=> $request->panel,'smart_url'=> $request->smart_url,'xtream_url'=> $request->xtream_url]);
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Created Panel']);
                            return redirect()->back();
                break;
            case 'update':  Panel::where('id',$request->panel_id)->update(['name'=> $request->panel,'smart_url'=> $request->smart_url,'xtream_url'=> $request->xtream_url]);
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Panel','objectable_id'=> $request->panel_id,'objectable_type'=> 'App\Models\Panel']);
                            return redirect()->back();
                break;
            case 'delete':  Panel::where('id',$request->panel_id)->delete();
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Deleted Panel']);
                            return redirect()->back();
                break;
        }
    }
}
