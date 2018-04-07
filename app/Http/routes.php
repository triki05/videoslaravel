<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::auth();

Route::get('/home', array(
    "as" => "home",
    "uses" => 'HomeController@index'
));

// Rutas del controlador de videos
Route::get("/crear-video", array(
    "as" => "createVideo",
    "middleware" => "auth",
    "uses" => "VideoController@createVideo"
));

Route::post("/guardar-video", array(
    "as" => "saveVideo",
    "middleware" => "auth",
    "uses" => "VideoController@saveVideo"
));

Route::get("/miniatura/{filename}",array(
    "as" => "miniatura",
    "uses" => "VideoController@getImage"
));

Route::get("/video/{videoId}",array(
    "as" => "detalles",
    "uses" => "VideoController@getVideoDetail"
));

Route::get("/ver-video/{filename}",array(
    "as" => "fileVideo",
    "uses" => "VideoController@getVideo"
));

Route::get('/delete-video/{videoId}',array(
    'as' => 'deleteVideo',
    'middleware' => 'auth',
    'uses' => "VideoController@deleteVideo"
));

Route::get('/edit-video/{videoId}',array(
    'as' => 'editVideo',
    'middleware' => 'auth',
    'uses' => 'VideoController@edit'
));

Route::post('/update-video/{videoId}',array(
    'as' => 'updateVideo',
    'middleware' => 'auth',
    'uses' => 'VideoController@update'
));

Route::get('/search/{busqueda?}', array(
    'as' => "search",
    'uses' => 'VideoController@search'
));

// Rutas de los comentarios
Route::post('/comentarios',array(
    'as' => 'comentarios',
    'middleware' => 'auth',
    'uses' => 'ComentariosController@store'
));

Route::get('/delComment/{commentId}',array(
    'as' => 'delComment',
    'middleware' => 'auth',
    'uses' => 'ComentariosController@delete'
));