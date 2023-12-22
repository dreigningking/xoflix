<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index',compact('plans'));
    }

    
    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {   

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price'=> ['required'],
            'status'=> ['required'],
            "channels"=> ['required', 'string', 'max:255'],
            "hd_quality"=> ['required', 'string', 'max:255'],
            "video_on_demand"=> ['required', 'string', 'max:255'],
            "sports"=> ['required', 'string', 'max:255'],  
            "intl_channels" => ['required', 'string', 'max:255'], 
            "customer_support" => ['required', 'string', 'max:255'], 
            "device_compatibility"=> ['required', 'string', 'max:255'], 
            "servers" => ['required', 'string', 'max:255'], 
            "movie_organization"=> ['required', 'string', 'max:255'], 
            "adult_channels"=> ['required', 'string', 'max:255'], 
        ]);
        $plan = Plan::create($request->all());
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Created Plans','objectable_id'=> $plan->id,'objectable_type'=> 'App\Models\Plan']);
        return redirect()->route('admin.plans.index');
        
    }

    
    public function edit(Plan $plan)
    {
        return view('admin.plans.edit',compact('plan'));
    }

    
    public function update(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price'=> ['required'],
            'status'=> ['required'],
            "channels"=> ['required', 'string', 'max:255'],
            "hd_quality"=> ['required', 'string', 'max:255'],
            "video_on_demand"=> ['required', 'string', 'max:255'],
            "sports"=> ['required', 'string', 'max:255'],  
            "intl_channels" => ['required', 'string', 'max:255'], 
            "customer_support" => ['required', 'string', 'max:255'], 
            "device_compatibility"=> ['required', 'string', 'max:255'], 
            "servers" => ['required', 'string', 'max:255'], 
            "movie_organization"=> ['required', 'string', 'max:255'], 
            "adult_channels"=> ['required', 'string', 'max:255'], 
        ]);
        
        $plan = Plan::where('id',$request->plan_id)->update($request->except(['_token','plan_id']));
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Plans','objectable_id'=> $request->plan_id,'objectable_type'=> 'App\Models\Plan']);
        return redirect()->route('admin.plans.index');
    }

    
    public function destroy(Request $request)
    {
        Plan::where('id',$request->plan_id)->delete();
        return redirect()->route('admin.plans.index');
    }
}
