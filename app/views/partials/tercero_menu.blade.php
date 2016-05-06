<div class="list-group">
	<p class="list-group-item active">
		<span class="glyphicon glyphicon-eye-open"></span>
		Datos del tercero
	</p>

	<a href="{{route('mostrar_tercero', ['id' => $tercero->id])}}" class="list-group-item">
		Resumen
	</a>

	@if(Auth::user()->rol == 'administrador')
	<a href="{{route('editar_tercero', ['id' => $tercero->id])}}" class="list-group-item">
		Editar tercero
	</a>
	@endif

	<a href="{{route('crear_cuenta', ['id_tercero' => $tercero->id])}}" class="list-group-item">
		Registrar una nueva cuenta bancaria del tercero
	</a>

	<p class="list-group-item active">
		<span class="glyphicon glyphicon-time"></span>
		Carteras por pagar
	</p>

	<a class="list-group-item" href="{{route('listado_de_carteras', ['documento' => 'PAGAR',
	'tercero' => $tercero->id])}}">
		Ver carteras por pagar del tercero
	</a>

	<a href="{{route('crear_cartera', ['documento' => 'PAGAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Registrar nueva cartera por <strong>pagar</strong> para el tercero
	</a>

	<p class="list-group-item active">
		<span class="glyphicon glyphicon-tower"></span>
		Carteras por cobrar
	</p>

	<a class="list-group-item" href="{{route('listado_de_carteras', ['documento' => 'COBRAR',
	'tercero' => $tercero->id])}}">
		Ver carteras por cobrar del tercero
	</a>

	<a href="{{route('crear_cartera', ['documento' => 'COBRAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Registrar nueva cartera por <strong>cobrar</strong> para el tercero
	</a>
</div>