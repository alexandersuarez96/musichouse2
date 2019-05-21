<?php

namespace App\Models;
use App\Models\Song;
use App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class MediaSong extends Model
{
    protected $fillable=[
        'medios_id',
        'songs_id',
        
        
    ];
    
    public function songs(){
        return $this->belongsTo(Song::class);
    }
    public function medios(){
        return $this->belongsTo(Medio::class);
    }
}        

