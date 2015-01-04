<h2>Cuentas bancarias</h2>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Banco</th>
			<th>Tipo</th>
			<th>Número</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tercero->cuentas as $cuenta)
		<tr>
			<td>{{$cuenta->banco}}</td>
			<td>{{$cuenta->tipo}}</td>
			<td>{{$cuenta->numero}}</td>
			<td>
				<a href="{{route('editar_cuenta', ['id' => $cuenta->id])}}" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-edit"></span>
					Editar cuenta
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>