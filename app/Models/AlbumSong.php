<?php

namespace App\Models;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
    protected $fillable=[
        'albums_id',
        'songs_id',
        
    ];
    
    public function songs(){
        return $this->belongsTo(Song::class);
    } 
    public function albums(){
        return $this->belongsTo(Album::class);
    }  
}
