@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Canal de: <span class="strong">{{$usuario->name." ".$usuario->surname}}</span></div>
					<div class="panel-body">				
						@include('layouts.videolist')
					</div>
				</div>
				@yield('pagination')
			</div>
			
		</div>
	</div>
@endsection