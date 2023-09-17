<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    // {"1":{"label":"1 Month","description":"2000"},"3":{"label":"3 Months","description":"3000"},"6":{"label":"6 Months","description":"4000"},"12":{"label":"12 Months","description":"6000"}}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sortBy = null;
        $status = null;
        $name = null;
        $withdrawals = Withdrawal::whereNotNull('user_id');
        if(request()->query() && request()->query('status')){
            $status = request()->query('status');
            $withdrawals = $withdrawals->where('status',strtolower($status));
        }

        if(request()->query() && request()->query('name')){
            $name = request()->query('name');
            $withdrawals = $withdrawals->whereHas('user',function($query) use($name){ 
                    $query->where('firstname','LIKE',"%$name%")->orWhere('lastname','LIKE',"%$name%");
                });
        }
        if(request()->query() && request()->query('from_date')){
            $from_date = request()->query('from_date');
            $withdrawals = $withdrawals->where('created_at','>=',$from_date);
        }
        if(request()->query() && request()->query('to_date')){
            $to_date = request()->query('to_date');
            $withdrawals = $withdrawals->where('created_at','<=',$to_date);
        }

        if(request()->query() && request()->query('sortBy')){
            $sortBy = request()->query('sortBy');
            if(request()->query('sortBy') == 'date_asc'){
                $withdrawals = $withdrawals->orderBy('created_at','asc');
            }
            if(request()->query('sortBy') == 'date_desc'){
                $withdrawals = $withdrawals->orderBy('created_at','desc');
            }
            
        }
        $withdrawals = $withdrawals->paginate(50);
        return view('admin.withdrawals',compact('withdrawals','status','name','sortBy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        Withdrawal::create(['reference'=> uniqid(),'user_id'=> $user->id,'amount'=> $request->amount]);
        return redirect()->back();
    }

    
    public function pay(Request $request)
    {
        $withdrawal = Withdrawal::find($request->withdrawal_id);
        $withdrawal->status = 'success';
        $withdrawal->approved_at = now();
        $withdrawal->save();
        $withdrawal->user->balance -= $withdrawal->amount;
        $withdrawal->user->save();
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
