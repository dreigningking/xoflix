<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.support');
    }

    
    public function conversation()
    {
        return view('admin.support_chat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request)
    {
        //
    }

    public function user()
    {
        return view('user.support');
    }

    
    public function send(Request $request)
    {
        //
    }

    
}
