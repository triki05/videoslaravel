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
                    
                    <ul id="video-list">
                    	@foreach($videos as $video)
                    	<li class="video-item col-md-4 pull-left">
                    		<div class="data">
                    			<!-- Imagen del video -->
                    			@if(Storage::disk('images')->has($video->image))
                    				<div class="video-image-thumb">
                    				
                    					<div class="col-md-6 col-md-offset-3">
                    						<img src="{{ url('/miniatura/'.$video->image) }}" width=50px height=50px>
                    					</div>
                    					
                    				</div>
                    			@endif
                    			<!-- Título del video -->
                    			<h4>{{$video->title}}</h4>
                    			
                    			<!-- Botones de acción -->
                    			
                    		</div>
                    	</li>
                    	@endforeach
                    </ul>
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
