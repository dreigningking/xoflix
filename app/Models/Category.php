<?php

namespace App\Models;

use App\Models\Sport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable  = ['name','image'];

    public function getAvatarAttribute(){
        return $this->image ? config('app.url')."/storage/$this->image" : null;  
    }

    public function sports(){
        return $this->hasMany(Sport::class);
    }
}
