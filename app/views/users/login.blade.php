@extends('master')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="text-center">Aplicación Cartera</h2>
		</div>
		<div class="panel-body">
			{{Form::open([
				'route' => 'autenticar',
				'method' => 'POST',
				'role' => 'form'
				])}}

				<div class="form-group">
					{{Form::label('email', 'Correo electrónico')}}
					{{Form::email('email', null, [
						'placeholder' => 'Correo electrónico',
						'class' => 'form-control',
						'required'
					])}}
				</div>

				<div class="form-group">
					{{Form::label('password', 'Contraseña')}}
					{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña'])}}
				</div>

				<div class="checkbox">
					<label>
						{{Form::checkbox('remember')}}
						Recordarme
					</label>
				</div>

				{{Form::submit('Entrar', ['class' => 'btn btn-primary btn-block btn-lg'])}}

			{{Form::close()}}
		</div>
	</div>
</div>
@stop