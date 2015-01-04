@extends('master')

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

<div class="col-md-10">

	<h1>Editar cartera por {{strtolower($cartera->documento)}} <small>de {{$tercero->nombre}}</small></h1>

	{{Form::model($cartera, ['route' => 'actualizar_cartera', 'role' => 'form'])}}

		{{Form::hidden('id', $cartera->id)}}

		@include('partials.cartera_form')

		@include('partials.btnguardar')

	{{Form::close()}}

</div>

</div> {{-- /.row --}}

@stop