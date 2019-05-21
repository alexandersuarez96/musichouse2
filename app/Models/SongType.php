<?php

namespace App\Models;
use App\Models\Song;
use Illuminate\Database\Eloquent\Model;

class SongType extends Model
{
    protected $fillable=[
        'nombre',
        
    ];
    public function songs(){
        return $this->hasMany(Song::class);
        }
        
}
