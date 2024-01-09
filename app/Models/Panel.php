<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panel extends Model
{
    use HasFactory;
    protected $fillable = ['name','smart_url','xtream_url'];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
