<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['reference','user_id','amount','method','duration','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
