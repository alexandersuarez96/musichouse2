<?php

namespace App\Models;

use App\Models\HomeMusic;
use App\Models\AlbumSong;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=[
        'nombre',
        'fecha',
        'home_musics_id',
    ];
    
    public function home_musics(){
    return $this->belongsTo(HomeMusic::class);
    }
   
    public function album_songs(){
    return $this->hasMany(AlbumSong::class);
    }
    
    
        
}
