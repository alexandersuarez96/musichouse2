<?php

namespace App\Models;
use App\Models\Album;
use Illuminate\Database\Eloquent\Model;

class HomeMusic extends Model
{
    protected $fillable=[
        'nombre',
        
    ];
    public function albums(){
        return $this->hasMany(Album::class);
        }
        
}
