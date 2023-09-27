<?php

namespace App\Models;

use App\Models\Link;
use App\Models\User;
use App\Models\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trial extends Model
{
    use HasFactory;
    protected $fillable = ['username','password','link_id','panel_id','m3u_link'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function link(){
        return $this->belongsTo(Link::class);
    }
    public function panel(){
        return $this->belongsTo(Panel::class);
    }
}
