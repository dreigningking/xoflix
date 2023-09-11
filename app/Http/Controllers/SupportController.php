<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $supports = Support::where('type','sending')->whereNull('read_at')->whereBetween('created_at',[now()->subMonth(),now()])->orderBy('created_at','desc')->get();
        return view('admin.support',compact('supports'));
    }

    
    public function conversation(User $user)
    {
        $supports = Support::where('user_id',$user->id)->whereBetween('created_at',[now()->subMonth(),now()])->orderBy('created_at','asc')->get();
        return view('admin.support_chat',compact('supports','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        Support::create(['user_id'=> $request->user_id,'message'=> $request->message,'type'=> 'replying']);
        return response()->json(200);
    }

    public function user()
    {
        $user = auth()->user();
        if($user->role != 'user')
        return redirect()->route('admin.support');
        $supports = Support::where('user_id',$user->id)->whereBetween('created_at',[now()->subMonth(),now()])->orderBy('created_at','asc')->get();
        return view('user.support',compact('user','supports'));
    }

    
    public function send(Request $request)
    {
        $user = auth()->user();
        Support::create(['user_id'=> $user->id,'message'=> $request->message,'type'=> 'sending']);
        return response()->json(200);
    }

    
}
