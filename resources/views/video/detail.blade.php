@extends('layouts.app')


@section('content')

<div class="col-md-10 col-md-offset-1">
	<h2 class="text-center">{{$video->title}}</h2>
	<hr>
	
	<div class="col-md-10 col-md-offset-1">
	<!-- Video -->
		<video controls id="video-player">
			<source src="{{ route('fileVideo',['filename'=>$video->video_path]) }}">
			Tu navegador no es compatible con HTML5
		</video>
	<!-- Descripción -->
		<div class="panel panel-default video-data col-md-12">
			<div class="panel-heading">
				<div class="panel-title text-right">
					Subido por <span class="strong">{{$video->user->name ." ".$video->user->surname}}</span> {{FormatTime::LongTimeFilter($video->created_at)}}
				</div>
			</div>
			<div class="panel-body">
				{{ $video->description }}
			</div>
		</div>
	
	<!-- Comentarios -->
	
		@include('video.comments')
		
	</div>
</div>
@endsection	