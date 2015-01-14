<div class="list-group">
	<a href="{{route('mostrar_tercero', ['id' => $tercero->id])}}" class="list-group-item active">
		{{$tercero->nombre}}
	</a>
	<a href="{{route('editar_tercero', ['id' => $tercero->id])}}" class="list-group-item">
		Editar tercero
	</a>
	<a href="{{route('crear_cuenta', ['id_tercero' => $tercero->id])}}" class="list-group-item">
		Crear cuenta bancaria
	</a>

	<a class="list-group-item active" href="{{route('listado_de_carteras', ['documento' => 'PAGAR',
	'tercero' => $tercero->id])}}">
		Carteras por pagar
	</a>
	<a href="{{route('crear_cartera', ['documento' => 'PAGAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Crear cartera por <strong>pagar</strong>
	</a>
	<a href="{{route('listado_de_carteras', ['documento' => 'PAGAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Ver carteras por <strong>pagar</strong> de este tercero
	</a>

	<a class="list-group-item active" href="{{route('listado_de_carteras', ['documento' => 'COBRAR',
	'tercero' => $tercero->id])}}">
		Carteras por cobrar
	</a>
	<a href="{{route('crear_cartera', ['documento' => 'COBRAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Crear cartera por <strong>cobrar</strong>
	</a>
	<a href="{{route('listado_de_carteras', ['documento' => 'COBRAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Ver carteras por <strong>cobrar</strong> de este tercero
	</a>
</div>