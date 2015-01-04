<div class="row">

	<div class="col-md-6">

		<div class="form-group {{$errors->first('nit', 'has-error')}}">
			{{Form::label('nit', 'NIT', ['class' => 'control-label'])}}
			{{Form::text('nit', null, [
				'placeholder' => 'NIT',
				'class' => 'form-control',
				'required',
				'maxlength' => '255'])}}

			{{$errors->first('nit', '<p class="text-warning">:message</p>')}}
		</div>

		<div class="form-group {{$errors->first('nombre', 'has-error')}}">
			{{Form::label('nombre', 'Nombre', ['class' => 'control-label'])}}
			{{Form::text('nombre', null, [
				'placeholder' => 'Nombre',
				'class' => 'form-control',
				'required',
				'maxlength' => '255'])}}

			{{$errors->first('nombre', '<p class="text-warning">:message</p>')}}

		</div>

		<div class="form-group">
			{{Form::label('direccion', 'Dirección')}}
			{{Form::text('direccion', null, [
				'placeholder' => 'Dirección',
				'class' => 'form-control',
				'maxlength' => '255'])}}
		</div>

		<div class="form-group">
			{{Form::label('telefono', 'Teléfono')}}
			{{Form::text('telefono', null, [
				'placeholder' => 'Teléfono',
				'class' => 'form-control',
				'maxlength' => '255'])}}
		</div>

		<div class="form-group">
			{{Form::label('email', 'Correo electrónico')}}
			{{Form::email('email', null, [
				'placeholder' => 'Correo electrónico',
				'class' => 'form-control',
				'maxlength' => '255'])}}
		</div>

	</div>

	<div class="col-md-6">

		<div class="form-group">
			{{Form::label('notas', 'Notas')}}
			{{Form::textarea('notas', null, [
				'placeholder' => 'Notas',
				'class' => 'form-control',
				'rows' => '17',
				'maxlength' => '1000'])}}
		</div>

	</div>

</div>