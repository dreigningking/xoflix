<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','message','type','read_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
