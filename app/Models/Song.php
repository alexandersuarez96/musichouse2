<?php

namespace App\Models;
use App\Models\Singer;
use App\Models\SongType;
use App\Models\AlbumSong;
use App\Models\MediaSong;
use App\Models\AuthorSong;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'nombre',
        'duracion',
        'singers_id',
        'song_types_id',
        
    ];
    
    public function singers(){
        return $this->belongsTo(Singer::class);
    }

    public function song_types(){
        return $this->belongsTo(SongType::class);
    }

    public function album_songs(){
        return $this->hasMany(AlbumSong::class);
    }
    
    public function author_songs(){
        return $this->hasMany(AuthorSong::class);
    } 
    
    public function media_songs(){
        return $this->hasMany(MediaSong::class);
    }

    
    
            
        
}
