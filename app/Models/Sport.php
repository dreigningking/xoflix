<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = ['player_a','player_a_image','player_b', 'player_b_image', 'league', 'category_id', 'channels', 'start_at'];
    protected $casts = ['channels'=> 'array','start_at'=> 'datetime'];
    protected $appends = ['game_day'];
    
    public function getFirstAvatarAttribute(){
        return $this->player_a_image ? config('app.url')."/storage/sports/$this->player_a_image" : null;  
    }

    public function getSecondAvatarAttribute(){
        return $this->player_b_image ? config('app.url')."/storage/sports/$this->player_b_image" : null;  
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getGameDayAttribute(){
        return $this->start_at->format('d');
    }
}
