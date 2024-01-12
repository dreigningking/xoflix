<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = ['player_a','player_a_image','player_b', 'player_b_image', 'league', 'category_id','plans', 'channels', 'start_at'];
    protected $casts = ['channels'=> 'array','plans'=> 'array','start_at'=> 'datetime'];

    public function getPlayeraAvatarAttribute(){
        return $this->player_a_image ? config('app.url')."/storage/sports/$this->player_a_image" : null;  
    }

    public function getPlayerbAvatarAttribute(){
        return $this->player_b_image ? config('app.url')."/storage/sports/$this->player_b_image" : null;  
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
