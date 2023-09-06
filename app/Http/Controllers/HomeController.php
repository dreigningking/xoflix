<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\FlutterwaveTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    use FlutterwaveTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if($user->role != 'user')
        return redirect()->route('admin.dashboard');
        $settings = Setting::all();
        $one = $settings->firstWhere('name','subscription_1month')->value;
        $three = $settings->firstWhere('name','subscription_3month')->value;
        $six = $settings->firstWhere('name','subscription_6month')->value;
        $twelve = $settings->firstWhere('name','subscription_12month')->value;
        return view('user.dashboard',compact('user','one','three','six','twelve'));
    }

    public function profile(){
        $user = auth()->user();
        $states = ['Abia State','Adamawa State','Akwa Ibom State','Anambra State','Bauchi State','Bayelsa State','Benue State','Borno State','Cross River State','Delta State','Ebonyi State','Edo State','Ekiti State','Enugu State','Gombe State','Imo State','Jigawa State','Kaduna State','Kano State','Katsina State','Kebbi State','Kogi State','Kwara State','Lagos State','Nasarawa State','Niger State','Ogun State','Ondo State','Osun State','Oyo State','Plateau State','Rivers State','Sokoto State','Taraba State','Yobe State','Zamfara State'];
        $banks = Cache::rememberForever('banks', function () {
            $response = $this->getBanksByFlutterWave();
            $banks = $response->data;   
            return $banks;
        });  
        return view('user.profile',compact('user','banks','states'));
    }

    public function profile_update(Request $request){
        /** @var \App\Models\User $user **/
        // dd($request->all());
        $user = auth()->user();
        if($request->filled('firstname')) $user->firstname = $request->firstname;
        if($request->filled('lastname')) $user->lastname = $request->lastname;
        if($request->filled('phone')) $user->phone = $request->phone;
        if($request->filled('state')) $user->state = $request->state;
        if($request->filled('bank_name')) $user->bank_name = $request->bank_name;
        if($request->filled('bank_code')) $user->bank_code = $request->bank_code;
        if($request->filled('account_number')) $user->account_number = $request->account_number;
        if($request->filled('account_name')) $user->account_name = $request->account_name;
        $user->save();
        return redirect()->back();
    }

    public function password_update(Request $request){
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|string',
            'password' => 'required','string','confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                        // ->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);
        }
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back();
            // return redirect()->back()->with(['flash_type' => 'success','flash_msg'=>'Password changed successfully']); //with success
        }
        else return redirect()->back()->withErrors(['oldpassword' => 'Your old password is wrong'])->with(['flash_type' => 'danger','flash_msg'=>'Something went wrong']);

    }

    
}
