@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">General</div>

                <div class="panel-body">
                    @if(Session::has('message'))
                    	<div class="alert alert-success text-center">
                    		{{Session::get('message')}}
                    	</div>
                    @endif
                    @if(session('delMessage'))
                    	<div class="alert alert-danger text-center">
                    		{{ session('delMessage') }}
                    	</div>
                    @endif
                    @include('layouts.videolist')
                </div>
            </div>
            @yield('pagination')
        </div>
    </div>
</div>
@endsection
