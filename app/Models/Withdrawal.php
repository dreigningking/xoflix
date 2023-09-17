<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = ['reference','user_id','amount','method','approved_at','info','status'];

    protected $casts = ['approved_at'=> 'datetime'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
