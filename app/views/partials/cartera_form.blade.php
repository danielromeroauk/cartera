<div class="row">

	<div class="col-md-4">

		<div class="form-group {{$errors->first('created_at', 'has-error')}}">
			{{Form::label('created_at', 'Fecha de emisión', ['class' => 'control-label'])}}

			{{Form::input('date', 'created_at',
				(isset($cartera->created_at)) ? date_format(new DateTime($cartera->created_at), 'Y-m-d') : null,
				['class' => 'form-control', 'required'])}}
		</div>

		<div class="form-group {{$errors->first('created_at', 'has-error')}}">
			{{Form::label('vencimiento', 'Fecha de vencimiento', ['class' => 'control-label'])}}

			{{Form::input('date', 'vencimiento',
				(isset($cartera->vencimiento)) ? date_format(new DateTime($cartera->vencimiento), 'Y-m-d') : null,
				['class' => 'form-control', 'required'])}}
		</div>

		<div class="form-group {{$errors->first('prefijo', 'has-error')}}">
			{{Form::label('prefijo', 'Prefijo', ['class' => 'control-label'])}}

			{{Form::select('prefijo',
				['' => 'Seleccione un prefijo', 'FACTURA' => 'FACTURA', 'REMISIÓN' => 'REMISIÓN'],
				null,
				['class' => 'form-control', 'required']
				)}}
		</div>

		<div class="form-group {{$errors->first('fisico', 'has-error')}}">
			{{Form::label('fisico', 'Físico', ['class' => 'control-label'])}}

			{{Form::text('fisico', null, [
				'placeholder' => 'Físico',
				'class' => 'form-control',
				'required',
				'maxlength' => '255'])}}

			{{$errors->first('fisico', '<p class="text-warning">:message</p>')}}
		</div>

		<div class="form-group {{$errors->first('pedido', 'has-error')}}">
			{{Form::label('pedido', 'Pedido', ['class' => 'control-label'])}}

			{{Form::text('pedido', null, [
				'placeholder' => 'Pedido',
				'class' => 'form-control',
				'maxlength' => '255'])}}

			{{$errors->first('pedido', '<p class="text-warning">:message</p>')}}
		</div>

	</div> {{-- /.col-md-4 --}}

	<div class="col-md-8">

		<div class="form-group {{$errors->first('valor', 'has-error')}}">
        	{{Form::label('valor', 'Valor', ['class' => 'control-label'])}}

        	{{Form::number('valor', null, [
        		'placeholder' => '0,00',
        		'class' => 'form-control',
        		'step' => '0.01',
        		'min' => '0.00'])}}

        	{{$errors->first('valor', '<p class="text-warning">:message</p>')}}
        </div>

		<div class="form-group {{$errors->first('notas', 'has-error')}}">
        	{{Form::label('notas', 'Notas', ['class' => 'control-label'])}}

        	{{Form::textarea('notas', null, [
        		'placeholder' => 'Notas',
        		'rows' => '13',
        		'class' => 'form-control',
        		'maxlength' => '1000'])}}

        	{{$errors->first('notas', '<p class="text-warning">:message</p>')}}
        </div>

	</div> {{-- /.col-md-8 --}}

</div> {{-- /.row --}}