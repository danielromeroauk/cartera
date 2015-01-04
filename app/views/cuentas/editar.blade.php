@extends('master')

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

<div class="col-md-6">

	<h1>Editar cuenta de <small>{{$cuenta->tercero->nombre}}</small></h1>

	{{Form::model($cuenta, ['route' => 'actualizar_cuenta', 'role' => 'form'])}}

		{{Form::hidden('id', $cuenta->id)}}

		@include('partials.cuenta_form')

		@include('partials.btnguardar')

	{{Form::close()}}

</div>

</div> {{-- /.row --}}

@stop