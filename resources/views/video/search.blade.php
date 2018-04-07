@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Resultados de la búsqueda de: <span class="strong">"{{$busqueda}}"</span></div>
					<div class="panel-body">
						<form class="col-md-2 pull-right" id="form-order" action="{{ url('/search/'.$busqueda) }}" method="get">
							<label for="filter">Ordenar</label>
							<select name="filter" class="form-control">
								<option value="new">Más nuevos</option>
								<option value="old">Más antigüos</option>
								<option value="alphabetic">A-Z</option>
							</select>
						</form>						
						@include('layouts.videolist')
					</div>
				</div>
				@yield('pagination')
			</div>
			
		</div>
	</div>

	

@endsection