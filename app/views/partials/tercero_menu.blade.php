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
	<a href="{{route('crear_cartera', ['documento' => 'PAGAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Crear cartera por pagar
	</a>
	<a href="{{route('crear_cartera', ['documento' => 'COBRAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Crear cartera por cobrar
	</a>
	<a href="{{route('listado_de_carteras', ['documento' => 'PAGAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Ver carteras por pagar de este tercero
	</a>
	<a href="{{route('listado_de_carteras', ['documento' => 'COBRAR', 'tercero' => $tercero->id])}}" class="list-group-item">
		Ver carteras por cobrar de este tercero
	</a>
</div>