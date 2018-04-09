<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\Video;
use App\Comentario;
use App\User;

class UserController extends Controller
{
    public function channel($userId){
        $user = User::find($userId);
        
        if(!is_object($user)){
            return redirect()->route('home')->with(['delMessage'=>'El usuario no existe']);
        }
        
        $videos = Video::where('userId',$userId)->paginate(5);
        
        return view('user.channel',array(
           'usuario' => $user,
            'videos' => $videos
        ));
    }
}
