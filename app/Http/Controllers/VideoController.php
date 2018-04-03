<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;

use App\Video;
use App\Comentario;

class VideoController extends Controller
{
    public function createVideo(){
        return view('video.createVideo');
    }
    
    public function saveVideo(Request $request){
        //Establecer hora de España
        date_default_timezone_set("Europe/Madrid");
        
        
        // Validar formulario
        $validateData = $this->validate($request,
            array(
                "title" => "required|string|min:10",
                "description" => "required|string",
                "image" => "required|mimes:jpg,jpeg,png|max:2048",
                "video" => "required|mimes:mp4,mpg4,mp4v,avi|max:10240"
            ));
        
        //Guardar el video
        $video = new Video();
        $user = Auth::user();
        
        $video->userId = $user->id;
        $video->title = $request->input("title");
        $video->description = $request->input("description");
        
        // Upload miniatura
        $imagen = $request->file("image");
        if($imagen){
            $rutaImagen = date('ynjHi').$imagen->getClientOriginalName();
            Storage::disk('images')->put($rutaImagen, File::get($imagen));
            $video->image = $rutaImagen;
        }
        
        // Upload video
        $video_file = $request->file("video");
        if($video_file){
            $videoPath = date('ynjHi').$video_file->getClientOriginalName();
            Storage::disk('videos')->put($videoPath, File::get($video_file));
            $video->video_path = $videoPath;
        }
           
        $video->save();
        
        return redirect()->route("home")->with(array(
           "message" => "El video se ha subido correctamente" 
        ));
    }
    
    // Método que nos devolverá la imagen
    public function getImage($filename){
        $file = Storage::disk("images")->get($filename);
        
        return  new Response($file, 200);
    }
    
    // Método que nos devolverá la página con los detalles del video
    public function getVideoDetail($videoId){
        $video = Video::find($videoId);
        
        return view('video.detail',array(
            "video" => $video
        ));
    }
    
    // Método que nos devolverá el video
    public function getVideo($filename){
        $file = Storage::disk("videos")->get($filename);
        
        return new Response($file,200);
    }
    
    //Método para borrar un video
    public function deleteVideo($videoId){
        $usuario = Auth::user();
        $video = Video::find($videoId);
        $comentarios = Comentario::where('videoId',$videoId)->get();
        
        if($usuario && $usuario->id == $video->userId){
            //Eliminar comentarios
            if($comentarios && count($comentarios)>0){
                foreach($comentarios as $comentario){
                    $comentario->delete();
                }
            }
            
            //Eliminar imagen y video del disco
            if(Storage::disk('images')->get($video->image)){
                Storage::disk('images')->delete($video->image);
            }
            if(Storage::disk('videos')->delete($video->video_path)){
                Storage::disk('videos')->delete($video->video_path);
            }
            
            
            //Eliminar video de la BBDD
            if($video){
                $video->delete();
            }
        }
        return redirect()->route('home')->with(array(
            'delMessage' => 'Video borrado correctamente',
        ));
    }
}