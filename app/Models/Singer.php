<?php

namespace App\Models;
use App\Models\Song;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable=[
        'nombre',
        'nacionalidad'
    ];
    public function songs(){
        return $this->hasMany(Song::class);
        }
        
}