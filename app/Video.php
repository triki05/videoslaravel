<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";
    
    // Relacion de uno a muchos
    
    public function comments(){
        return $this->hasMany("App\Comentario","videoId")->orderBy('created_at','desc');
    }
    
    // Relacion de muchos a uno
    public function user(){
        return $this->belongsTo("App\User","userId");
    }
}
