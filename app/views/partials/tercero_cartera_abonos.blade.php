<h2>Abonos</h2>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Forma de pago</th>
			<th class="text-right">Monto</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th colspan="2" class="text-right">
				Total
			</th>
			<td class="text-right">{{number_format($cartera->totalAbonado(), 2, ',', '.')}}</td>
			<td> </td>
		</tr>
	</tfoot>
	<tbody>
		@foreach($cartera->abonos as $abono)
		<tr>
			<td>{{date_format(new Datetime($abono->created_at), 'Y-m-d')}}</td>
			<td>
				{{$abono->forma_pago}}
				@if($abono->cuenta)
					Cuenta
					{{$tercero->cuentas_array()[$abono->cuenta_id]}}
				@endif
			</td>
			<td class="text-right">{{number_format($abono->monto, 2, ',', '.')}}</td>
			<td>
				<a href="{{route('editar_abono', ['id' => $abono->id])}}" class="btn btn-warning btn-sm">
					<span class="glyphicon glyphicon-edit"></span>
					Editar
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>