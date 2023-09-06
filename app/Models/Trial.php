<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trial extends Model
{
    use HasFactory;
    protected $fillable = ['username','password','link','type'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
