@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Principal</div>

                <div class="panel-body">
                    @if(Session::has('message'))
                    	<div class="alert alert-success text-center">
                    		{{Session::get('message')}}
                    	</div>
                    @endif
                    
                    <div id="video-list">
                    	@foreach($videos as $video)
                    	<div class="video-item col-md-12 pull-left panel panel-default">
                    		<div class="panel-body">
                    			<!-- Imagen del video -->
                    			@if(Storage::disk('images')->has($video->image))
                    				<div class="video-image-thumb col-md-3 pull-left">
                    				
                    					<div class="video-image-mask">
                    						<img src="{{ url('/miniatura/'.$video->image) }}" class="video-image">
                    					</div>
                    					
                    				</div>
                    			@endif
                    			<!-- Título del video -->
                    			<div class="data">
                    				<h4 class="video-title"><a href="{{ route('detalles', ['videoId'=>$video->id]) }}">{{$video->title}}</a></h4>
                    				<p>Autor: {{$video->user->name}} {{$video->user->surname}}</p>
                    				
                    			</div>
                    			
                    			<!-- Botones de acción -->
                    			<div class="pull-right">
                        			<a href="" class="btn btn-success">Ver</a>
                        			@if(Auth::check() && Auth::user()->id == $video->user->id)
                        				<a href="" class="btn btn-warning">Editar</a>
                        				<a href="" class="btn btn-danger">Eliminar</a>
                        			@endif
                    			</div>
                    		</div>
                    	</div>
                    	@endforeach
                    	
                    </div>
                </div>
            </div>
            
            <!-- Paginación de videos -->
            <div class="text-center">
            {{$videos->links()}}
            </div>
            
        </div>
    </div>
</div>
@endsection
