<?php

namespace App\Models;
use App\Models\MediaSong;

use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    protected $fillable=[
        'nombre',
        
    ];
    public function home_musics(){
        return $this->hasMany(MediaSong::class);
        }
}
