@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Resultados de la búsqueda de: <span class="strong">"{{$busqueda}}"</span></div>
					<div class="panel-body">
					@if(count($videos)>0)
						<form class="col-md-3 pull-right" id="form-order" action="{{ url('/search/'.$busqueda) }}" method="get">
							<select name="filter" class="form-control" id="filter">
								<option value="" selected>Ordenar</option>
								<option value="new">Más nuevos</option>
								<option value="old">Más antiguos</option>
								<option value="alphabetic">A-Z</option>
							</select>
						</form>
					@endif						
						@include('layouts.videolist')
					</div>
				</div>
				@yield('pagination')
			</div>
			
		</div>
	</div>
	<script>
		
		window.addEventListener("load",function(){
			var selector = document.getElementById('filter');
			selector.addEventListener("change",function(){
				location.pathname = "/search/"+'{{$busqueda}}'+"/"+selector.value;
			});			
		});
	</script>
@endsection