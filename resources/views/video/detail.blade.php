@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
	<h2 class="text-center">{{$video->title}}</h2>
	<hr>
	
	<div class="col-md-8 col-md-offset-1">
	<!-- Video -->
		<video controls id="video-player">
			<source src="{{ route('fileVideo',['filename'=>$video->video_path]) }}">
			Tu navegador no es compatible con HTML5
		</video>
	<!-- Descripción -->
	
	<!-- Comentarios -->
	</div>
</div>
@endsection	