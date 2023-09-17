<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','referred_id','amount'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function referred(){
        return $this->belongsTo(User::class,'referred_id');
    }
}
