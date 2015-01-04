<div class="form-group {{$errors->first('banco', 'has-error')}}">
	{{Form::label('banco', 'Banco', ['class' => 'control-label'])}}
	{{Form::text('banco', null, [
		'placeholder' => 'Banco',
		'class' => 'form-control',
		'required',
		'maxlength' => '255'])}}

	{{$errors->first('banco', '<p class="text-warning">:message</p>')}}
</div>

<div class="form-group {{$errors->first('tipo', 'has-error')}}">
	{{Form::label('tipo', 'Tipo', ['class' => 'control-label'])}}
	{{Form::text('tipo', null, [
		'placeholder' => 'Ahorros, Corriente, Fiduciaria',
		'class' => 'form-control',
		'required',
		'maxlength' => '255'])}}

	{{$errors->first('tipo', '<p class="text-warning">:message</p>')}}
</div>

<div class="form-group {{$errors->first('numero', 'has-error')}}">
	{{Form::label('numero', 'Número de cuenta', ['class' => 'control-label'])}}
	{{Form::text('numero', null, [
		'placeholder' => 'Número de cuenta',
		'class' => 'form-control',
		'required',
		'maxlength' => '255'])}}

	{{$errors->first('numero', '<p class="text-warning">:message</p>')}}
</div>