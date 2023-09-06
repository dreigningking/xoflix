<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Task;
use App\Models\Trial;
use App\Models\Payment;
use App\Models\Withdrawal;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'role',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['name'];

    public function getNameAttribute(){
        return ucwords($this->firstname.' '.$this->lastname);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '_'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function activeSubscriptions(){
        return $this->hasMany(Subscription::class)->where('start_at', '<', now())->where('end_at','>',now());
    }

    public function trials(){
        return $this->hasMany(Trial::class);
    }

    public function activeTrials(){
        return $this->hasMany(Trial::class)->where('created_at','>',now()->subHours(6));
    }

    public function affiliateTrials(){
        return $this->hasMany(Trial::class,'affiliate_id','id');
    }


    public function referrals(){
        return $this->hasMany(User::class,'referred_by');
    }

    public function earnings(){
        return $this->hasMany(Earning::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function withdrawals(){
        return $this->hasMany(Withdrawal::class);
    }
}
