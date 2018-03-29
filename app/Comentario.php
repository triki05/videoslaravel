<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = "comentarios";
    
    
    
    // Relacion de muchos a uno
    public function user(){
        return $this->belongsTo("App\User","userId");
    }
    
    public function video(){
        return $this->belongsTo("App\User","videoId");
    }
}
