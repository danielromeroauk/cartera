@extends('master')

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

	<div class="col-md-8">

		<h1>Crear cartera por cobrar <small>a {{$tercero->nombre}}</small></h1>

		{{Form::open(['route' => 'guardar_cartera', 'role' => 'form', 'method' => 'POST'])}}

			{{Form::hidden('documento', 'COBRAR')}}

			{{Form::hidden('tercero_id', $tercero->id)}}

			@include('partials.cartera_form')

			@include('partials.btnguardar')

		{{Form::close()}}

	</div>

</div> {{-- /.row --}}

@stop