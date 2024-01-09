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

    protected $fillable = ['user_id','plan_id','username','password','panel_id','connections','start_at','end_at'];
    protected $casts = ['start_at'=> 'datetime','end_at'=> 'datetime'];

    public function getDurationAttribute(){
        return $this->payment->duration ?? 1;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class)->latestOfMany();
    }

    public function link(){
        return $this->belongsTo(Link::class);
    }
    public function panel(){
        return $this->belongsTo(Panel::class);
    }

    public function scopeExpired($query){
        return $query->whereNotNull('end_at')->where('end_at','<',now())->where('end_at','>',now()->subDay());
    }
    public function scopeExpiring($query){
        return $query->whereNotNull('end_at')->where('end_at','>',now())->where('end_at','>',now()->addDays(7));
    }
}
