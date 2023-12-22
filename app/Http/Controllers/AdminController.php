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
        $links = Link::all();
        $panels = Panel::all();
        return view('admin.settings',compact('settings','links','panels'));
    }

    

    
    public function updateSettings(Request $request)
    {
        
        foreach($request->except('_token') as $key => $value){
            Setting::where('name',$key)->update(['value'=> $value]);
        }
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Settings']);
        return redirect()->back();
    }

    

    
    public function links(Request $request){
        switch($request->action){
            case 'create':  Link::create(['url'=> $request->url]);
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Created Link']);
                            return redirect()->back();
                break;
            case 'update':  Link::where('id',$request->url_id)->update(['url'=> $request->url]);
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Link','objectable_id'=> $request->url_id,'objectable_type'=> 'App\Models\Link']);
                            return redirect()->back();
                break;
            case 'delete':  Link::where('id',$request->url_id)->delete();
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Deleted Link']);
                            return redirect()->back();
                break;
        }
    }

    public function panels(Request $request){
        switch($request->action){
            case 'create':  Panel::create(['name'=> $request->panel]);
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Created Panel']);
                            return redirect()->back();
                break;
            case 'update':  Panel::where('id',$request->panel_id)->update(['name'=> $request->panel]);
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
