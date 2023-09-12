<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','user');
        if($search = request()->search)
        $users = $users->where('firstname','LIKE',"%$search%")->orWhere('lastname','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%");
        if(request()->expectsJson())
        return response()->json(['data'=> $users->get()],200);
        else $users = $users->paginate(50);
        return view('admin.users',compact('users'));
    }

    
    public function paid_users()
    {
        $payments = Payment::where('status','success')->doesntHave('subscriptions')->with('user')->get();
        return response()->json(['data'=> $payments],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    

}
