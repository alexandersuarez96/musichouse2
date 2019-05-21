<?php

namespace App\Models;
use App\Models\Song;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class AuthorSong extends Model
{
    protected $fillable=[
        'authors_id',
        'songs_id',
    ];
    
    public function songs(){
    return $this->belongsTo(Song::class);
    }
    public function authors(){
        return $this->belongsTo(Author::class);
    }
}
