@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido a MiniYouTube</div>

                <div class="panel-body">
                    Bienvenido a MiniYouTube, para poder ver los videos es necesario estar <a href="{{ url('/register') }}">registrado</a> y 
                    <a href="{{ url('/login') }}">logueado</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
