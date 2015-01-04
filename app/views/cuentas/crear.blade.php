@extends('master')

@section('content')

<div class="col-md-6">

	<h1>Crear cuenta <small>para {{$tercero->nombre}}</small></h1>

	{{Form::open(['route' => 'guardar_cuenta', 'role' => 'form', 'method' => 'POST'])}}

		{{Form::hidden('tercero_id', $tercero->id)}}

		@include('partials.cuenta_form')

		@include('partials.btnguardar')

	{{Form::close()}}

</div>

@stop