<?php

namespace App\Models;

use App\Models\Link;
use App\Models\Plan;
use App\Models\User;
use App\Models\Panel;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','plan_id','duration','payment_id','m3u_link','username','password','link_id','panel_id','start_at','end_at'];
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

    public function link(){
        return $this->belongsTo(Link::class);
    }
    public function panel(){
        return $this->belongsTo(Panel::class);
    }
}
