@extends('master')

@section('content')

<div class="col-md-6">

	<h1>Cambio de password</h1>

	{{Form::open([
		'route' => 'actualizar_password',
		'method' => 'POST',
		'role' => 'form',
	])}}

		<div class="form-group {{$errors->first('password_actual', 'has-error')}}">
			{{Form::label('password_actual', 'Clave actual', ['class' => 'control-label'])}}
			{{Form::password('password_actual', ['class' => 'form-control', 'required'])}}
		</div>

		<div class="form-group {{$errors->first('nuevo_password', 'has-error')}}">
			{{Form::label('nuevo_password', 'Nueva clave', ['class' => 'control-label'])}}
			{{Form::password('nuevo_password', ['class' => 'form-control', 'required'])}}
			{{$errors->first('nuevo_password', '<p class="text-warning">:message</p>')}}
		</div>

		<div class="form-group {{$errors->first('nuevo_password', 'has-error')}}">
			{{Form::label('nuevo_password_confirmation', 'Repita la nueva clave', ['class' => 'control-label'])}}
			{{Form::password('nuevo_password_confirmation', ['class' => 'form-control', 'required'])}}
		</div>

		{{Form::submit('Enviar', ['class' => 'btn btn-success'])}}

	{{Form::close()}}

</div>

@stop