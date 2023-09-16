<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','plan_id','duration','payment_id','m3u_link','xtream_username','xtream_password','xtream_link','start_at','end_at'];
    protected $casts = ['start_at'=> 'datetime','end_at'=> 'datetime'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
