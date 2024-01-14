<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Sport;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SportsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $sports = Sport::all();
        $plans = Plan::all();
        return view('admin.sports',compact('categories','sports','plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories(Request $request)
    {
        // dd($request->all());
        switch($request->action){
            case 'create':  
                if($request->hasFile('image')){
                    $image = time().'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/',$image);
                }
                Category::create(['name'=> $request->name,'image'=> $image,'plan_id'=> $request->plan_id]);
                Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin created category']);
                return redirect()->back();
            break;
            case 'update': 
                $category = Category::find($request->category_id); 
                if($request->hasFile('image')){
                    Storage::delete('public/',$category->image);
                    $image = time().'.'.$request->file('image')->getClientOriginalExtension();
                    $request->file('image')->storeAs('public/',$image);
                    $category->image = $image;
                }
                if($request->name) $category->name = $request->name;
                if($request->plan_id) $category->plan_id = $request->plan_id;
                $category->save();
                Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Category','objectable_id'=> $request->category_id,'objectable_type'=> 'App\Models\Category']);
                return redirect()->back();
            break;
            case 'delete':  Category::where('id',$request->category_id)->delete();
                            Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Deleted Category']);
                            return redirect()->back();
            break;
        }
    }

    
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'player_a' => 'required|string',
            'player_a_image' => 'required|image',
            'player_b' => 'required|string',
            'player_b_image' => 'required|image',
            'league' => 'required|string',
            'category_id' => 'required',
            'channels' => 'required|string',
            'start_at' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->hasFile('player_a_image')){
            $player_a = 'player1'.time().'.'.$request->file('player_a_image')->getClientOriginalExtension();
            $request->file('player_a_image')->storeAs('public/sports/',$player_a);
        }
        if($request->hasFile('player_b_image')){
            $player_b = 'player2'.time().'.'.$request->file('player_b_image')->getClientOriginalExtension();
            $request->file('player_b_image')->storeAs('public/sports/',$player_b);
        }
        $channels = [];
        foreach (explode(PHP_EOL,$request->channels) as $channel) {
           $channels[] = $channel;
        }
        $sport = Sport::create(['player_a'=> $request->player_a,'player_a_image' => $player_a,
        'player_b' => $request->player_b, 'player_b_image' => $player_b, 'league' => $request->league, 
        'category_id' => $request->category_id, 'channels' => $channels, 
        'start_at' => Carbon::createFromFormat('m/d/Y h:i A',$request->start_at)]);
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin created Sport']);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'sport_id' => 'required',
            'player_a' => 'required|string',
            'player_a_image' => 'nullable|image',
            'player_b' => 'required|string',
            'player_b_image' => 'nullable|image',
            'league' => 'required|string',
            'category_id' => 'required',
            'channels' => 'required|string',
            'start_at' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $sport = Sport::find($request->sport_id);
        if($request->hasFile('player_a_image')){
            Storage::delete('public/sports/',$sport->player_a_image);
            $player_a = 'player1'.time().'.'.$request->file('player_a_image')->getClientOriginalExtension();
            $request->file('player_a_image')->storeAs('public/sports/',$player_a);
            $sport->player_a_image = $player_a;
        }
        if($request->hasFile('player_b_image')){
            Storage::delete('public/sports/',$sport->player_b_image);
            $player_b = 'player2'.time().'.'.$request->file('player_b_image')->getClientOriginalExtension();
            $request->file('player_b_image')->storeAs('public/sports/',$player_b);
            $sport->player_b_image = $player_b;
        }
        $channels = [];
        foreach (explode(PHP_EOL,$request->channels) as $channel) {
           $channels[] = $channel;
        }
        $sport->player_a = $request->player_a;
        $sport->player_b = $request->player_b; 
        $sport->league = $request->league;
        $sport->category_id = $request->category_id;
        $sport->channels = $channels;
        $sport->start_at = Carbon::createFromFormat('m/d/Y h:i A',$request->start_at);
        $sport->save();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Updated Sport','objectable_id'=> $request->sport_id,'objectable_type'=> 'App\Models\Sport']);
        return redirect()->back();
    }
    
    public function destroy(Request $request)
    {
        $sport = Sport::find($request->sport_id);
        Storage::delete('public/sports/',$sport->player_a_image);
        Storage::delete('public/sports/',$sport->player_b_image);
        $sport->delete();
        Activity::create(['user_id'=> auth()->id(),'description'=> 'Admin Deleted Sport']);
        return redirect()->back();
    }

    public function show()
    {
        $user = auth()->user();
        $plan = $user->activeSubscriptions->isNotEmpty() ? $user->activeSubscriptions->first()->plan_id : 0;
        // $sports = Sport::where('start_at','>',now())->whereHas('category',function( $query) use($plan){ $query->where('plan_id',$plan);})->orderBy('start_at','asc')->get();
        $sports = Sport::where('start_at','>',now())->whereHas('category',function($query) use($plan){ $query->where('plan_id',$plan);})->orderBy('start_at','asc')->get();
        return view('user.sports',compact('sports'));
    }


}
