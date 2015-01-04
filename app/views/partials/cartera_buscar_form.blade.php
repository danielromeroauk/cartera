<div class="panel panel-default">
	<div class="panel-body">

		<div class="col-sm-8">
			{{Form::open(['route' => ['buscar_cartera', 'documento' => $documento, 'tercero' => $tercero->id], 'role' => 'form', 'method' => 'GET'])}}

				<div class="input-group">

					<span class="input-group-addon">
						<input type="radio" name="todos" value="true" /> Todos
					</span>

					<span class="input-group-addon">
						<input type="radio" name="todos" value="false" checked /> Con saldo
					</span>

					{{Form::text('buscar', null, ['placeholder' => 'Buscar por físico', 'class' => 'form-control', 'autofocus'])}}

					<div class="input-group-btn">
						{{Form::submit('Buscar', ['class' => 'btn btn-primary'])}}
					</div>

				</div> {{-- /.input-groupda --}}

			{{Form::close()}}

		</div> {{-- /.col-sm-8 --}}

		<div class="col-sm-3 col-sm-offset-1 text-right">
			<a href="{{route('crear_cartera', ['documento' => $documento, 'tercero' => $tercero->id])}}" class="btn btn-success">
				<span class="glyphicon glyphicon-plus"></span>
				Crear cartera por {{strtolower($documento)}}
			</a>
		</div>

		@if(Session::has('mensaje'))
			<div class="col-sm-12">
				<p class="well">
					{{Session::get('mensaje')}}
				</p>
			</div>
		@endif

	</div> {{-- /.panel-body --}}
</div> {{-- /.panel --}}