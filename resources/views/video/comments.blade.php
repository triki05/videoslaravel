<h4>Comentarios</h4>
<hr>
@if(Auth::check())
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if(session('message'))
    	<div class='col-md-10 col-md-offset-1 alert alert-success text-center'>
    		{{ session('message') }}
    	</div>
    @endif
    <form class="col-md-8 col-md-offset-2" method="post" action="{{ route('comentarios') }}">
    	{!! csrf_field() !!}
    	<input type="hidden" name="videoId" value="{{ $video->id }}" required>
    	<p><textarea class="form-control" name="body" rows="5" required></textarea></p>
    	<button type="submit" class="btn btn-success pull-right">Comentar</button>
    </form>

@endif
<div class="clearfix"></div>
<hr>
@if(isset($video->comments))
	<div id="comments-list">
		@foreach($video->comments as $comentario)
			<div class="comment-item col-md-8 col-md-offset-2">
				<div class="panel panel-default comment-data">
					<div class="panel-heading">
						<div class="panel-title text-right">
							Publicado por <span>{{$comentario->user->name." ".$comentario->user->surname}}</span> {{ FormatTime::LongTimeFilter($comentario->created_at) }}
						</div>
					</div>
					<div class="panel-body">
						{{ $comentario->body }}
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif