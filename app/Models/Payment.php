<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subscription;
use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['reference','user_id','amount','method','duration','status'];

    public static function boot(){
        parent::boot();
        parent::observe(new PaymentObserver);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
