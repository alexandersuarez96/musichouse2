<?php

namespace App\Models;
use App\Models\AuthorSong;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable=[
        'nombre',
        'fecha',
        'nacionalidad',
        'sexo',
        
    ];
    public function author_songs(){
        return $this->hasMany(AuthorSong::class);
        }
        
}
