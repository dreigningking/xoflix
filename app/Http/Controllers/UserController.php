<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Exports\UsersExport;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = null;
        $from = null;
        $to = null;
        $users = User::where('role','user');
        if($search = request()->search)
        $users = $users->where('firstname','LIKE',"%$search%")->orWhere('lastname','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%");
        if($from = request()->from)
        $users = $users->where('created_at','>=',$from);
        if($to = request()->to)
        $users = $users->where('created_at','<=',$to);
        if(request()->query() && request()->query('download')){
            return Excel::download(new UsersExport($users->get()), 'users.xlsx');
        }
        $users = $users->orderBy('firstname','asc')->paginate(50);
        return view('admin.users',compact('users','search','from','to'));
    }

    
    public function loginAs($id){
        
        session(['admin'=> auth()->user()->role == "admin" ? auth()->id() : null]);
        Auth::loginUsingId($id);
        return redirect()->route('dashboard');
    }

    public function manage(Request $request){
        //dd($request->user_id);
        $user = User::find($request->user_id);
        $user->status = !$user->status;
        $user->save();
        return redirect()->back();
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
