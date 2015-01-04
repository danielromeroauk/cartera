@extends('master')

@section('content')

<h1>Crear tercero</h1>

{{Form::open(['route' => 'guardar_tercero', 'role' => 'form', 'method' => 'POST'])}}

	@include('partials.tercero_form')

	@include('partials.btnguardar')

{{Form::close()}}

@stop