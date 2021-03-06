<div id="video-list">
	@if(count($videos)>0)
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
    				<p>Subido por <a href="{{route('channel',['userId' => $video->user->id])}}" class="video-author">{{$video->user->name}} {{$video->user->surname}}</a></p>
    				
    			</div>
    			
    			<!-- Botones de acción -->
    			<div class="pull-right">
        			<a href="{{ route('detalles', ['videoId'=>$video->id]) }}" class="btn btn-success">Ver</a>
        			@if(Auth::check() && Auth::user()->id == $video->user->id)
        				<a href="{{ route('editVideo', ['videoId' => $video->id]) }}" class="btn btn-warning">Editar</a>
        				<a href="#modalWindow{{$video->id}}" role="button" class="btn btn-danger pull-right modalButton" data-toggle="modal">Eliminar</a>
        				{{-- Modal / Ventana / Overlay en HTML --}}
    					<div id="modalWindow{{$video->id}}" class="modal fade">
    						<div class="modal-dialog">
    							<div class="modal-content">
    								<div class="modal-header">
    									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    									<h4 class="modal-title">¿Estás seguro?</h4>
    								</div>
    								<div class="modal-body">
    									<p>¿Seguro que quieres borrar este video?</p>
    									<p class="text-warning"><small>{{$video->title}}</small></p>
    								</div>
    								<div class="modal-footer">
    									<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    									<a href="{{ route('deleteVideo',['videoId'=>$video->id]) }}" type="button"  class="btn btn-danger">Eliminar</a>
    								</div>
    							</div>
    						</div>
    					</div>
        			@endif
    			</div>
    		</div>
    	</div>
    	@endforeach
	@else
		<div class="alert alert-danger text-center">
			No existe ningún video
		</div>
	@endif
</div>
<div class="clearfix"></div>
<!-- Paginación de videos -->
@section('pagination')
<div class="text-center">
	{{$videos->links()}}
</div>
@endsection