@extends('master')

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

<div class="col-md-10">

	<h1>Editar abono de la {{$abono->cartera->prefijo}} {{$abono->cartera->fisico}} <small>de {{$tercero->nombre}}</small></h1>

	{{Form::model($abono, ['route' => 'actualizar_abono', 'role' => 'form'])}}

		{{Form::hidden('id', $abono->id)}}

		@include('partials.abono_form')

		@include('partials.btnguardar')

	{{Form::close()}}

</div>

</div> {{-- /.row --}}

@stop