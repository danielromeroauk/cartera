<div class="col-md-8">

	<div class="form-group {{$errors->first('monto', 'has-error')}}">
		{{Form::label('monto', 'Monto', ['class' => 'control-label'])}}

		{{Form::number('monto', null, [
				'placeholder' => '0,00',
				'class' => 'form-control',
				'step' => '0.01',
				'min' => '0.00',
				'max' => $max
				])}}

		{{$errors->first('monto', '<p class="text-warning">:message</p>')}}
	</div>

	<div class="form-group {{$errors->first('notas', 'has-error')}}">
		{{Form::label('notas', 'Notas', ['class' => 'control-label'])}}

		{{Form::textarea('notas', null, [
			'placeholder' => 'Notas',
			'rows' => '8',
			'class' => 'form-control',
			'maxlength' => '1000'])}}

		{{$errors->first('notas', '<p class="text-warning">:message</p>')}}
	</div>

</div> {{-- /.col-md-8 --}}


<div class="col-md-4">

	<div class="form-group {{$errors->first('created_at', 'has-error')}}">

		{{Form::label('created_at', 'Fecha', ['class' => 'control-label'])}}

		{{Form::input('date', 'created_at',
			(isset($abono->created_at)) ? date_format(new DateTime($abono->created_at), 'Y-m-d') : null,
			['class' => 'form-control', 'required'])}}

	</div>

	<div class="form-group">

		{{Form::label('cuenta_id', 'Cuenta Bancaria', ['class' => 'control-label'])}}

		{{Form::select('cuenta_id', $tercero->cuentas_array(),
			(isset($abono->cuenta_id) ? $abono->cuenta_id : null),
			['class' => 'form-control']
			)}}

	</div>

	<div class="form-group">

		{{Form::label('forma_pago', 'Forma de pago', ['class' => 'control-label'])}}

		{{Form::select('forma_pago', Abono::formas_pago_array(),
			(isset($abono->forma_pago) ? $abono->forma_pago : 'EFECTIVO'),
			['class' => 'form-control']
			)}}

	</div>

	<div class="form-group {{$errors->first('comprobante', 'has-error')}}">
		{{Form::label('comprobante', 'Soporte contable', ['class' => 'control-label'])}}

		{{Form::text('comprobante', null, [
			'placeholder' => 'Soporte contable',
			'class' => 'form-control',
			'required',
			'maxlength' => '255'])}}

		{{$errors->first('comprobante', '<p class="text-warning">:message</p>')}}
	</div>

</div> {{-- /.col-md-4 --}}