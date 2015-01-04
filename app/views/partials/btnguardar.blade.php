<div class="row">

	<div class="col-xs-3">
		<a href="{{route('home')}}" class="btn btn-danger">
			Cancelar
		</a>
	</div>

	<div class="col-xs-3 col-xs-offset-6 text-right">
		{{Form::submit('Guardar', ['class' => 'btn btn-success'])}}
	</div>

</div>