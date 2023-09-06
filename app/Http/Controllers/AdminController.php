<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Activity;
use App\Models\Withdrawal;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $thisMonthSubscriptions = Subscription::whereMonth('created_at',now()->format('m'))->count();
        $thisMonthPayments = Payment::where('status','success')->whereMonth('created_at',now()->format('m'))->count();
        $thisMonthWithdrawals = Withdrawal::where('status','paid')->whereMonth('created_at',now()->format('m'))->count();
        $recentPayments = Payment::where('status','success')->orderBy('created_at','desc')->whereBetween('created_at',[Carbon::yesterday(),now()])->get();
        $recentWithdrawal = Withdrawal::where('status','pending')->orderBy('created_at','desc')->get();
        
        $totalActive = Subscription::where('start_at', '<', now())->where('end_at','>',now())->count();
        $today = Subscription::whereDay('end_at',now()->format('d'))->count();
        $thisWeek = Subscription::whereBetween('end_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->count();
        $thisMonth = Subscription::whereMonth('end_at',now()->format('m'))->count();
        $availableTrials = Trial::whereNull('user_id')->whereNull('affiliate_id')->count();
        return view('admin.dashboard',compact('thisMonthUsers','thisMonthSubscriptions','thisMonthPayments','thisMonthWithdrawals','recentPayments','recentWithdrawal','totalActive','today','thisWeek','thisMonth','availableTrials'));
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
        return view('admin.settings',compact('settings'));
    }

    

    
    public function updateSettings(Request $request)
    {
        
        foreach($request->except('_token') as $key => $value){
            Setting::where('name',$key)->update(['value'=> $value]);
        }
        // Cache::forget('settings');
        // $settings = Cache::rememberForever('settings', function () {
        //     return \App\Models\Setting::select(['name','value'])->get()->pluck('value','name')->toArray();
        // });
        return redirect()->back();
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
