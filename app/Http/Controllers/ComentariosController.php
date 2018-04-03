<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Comentario;
use App\Video;

class ComentariosController extends Controller
{
    public function store(Request $request){
        $validate = $this->validate($request,[
            'body' => 'required|min:20'
        ]);
        
        $comentario = new Comentario();
        $usuario = Auth::user();
        
        $comentario->userId = $usuario->id;
        $comentario->videoId = $request->input('videoId');
        $comentario->body = $request->input('body');
        
        $comentario->save();
        
        return redirect()->route('detalles', [
            'videoId' => $comentario->videoId,
        ])->with(array('message'=>'Comentario publicado correctamente'));
    }
    public function delete($comentarioId){
        $usuario = Auth::user();
        $comentario = Comentario::find($comentarioId);
        
        if($usuario && ($comentario->userId == $usuario->id || $comentario->video->userId == $usuario->id)){
            $comentario->delete();
        }
        return redirect()->route('detalles',[
            'videoId' => $comentario->videoId,
        ])->with(array('delMessage'=>'Comentario eliminado correctamente'));
    }
}
