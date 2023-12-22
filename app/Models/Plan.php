<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','features','price','status',"channels","hd_quality","video_on_demand", "sports",  "intl_channels" , "customer_support" , "device_compatibility", "servers" , "movie_organization", "adult_channels" ];
    protected $casts = ['features'=> 'array'];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
