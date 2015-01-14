<h2>Abonos</h2>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Forma de pago</th>
			<th class="text-right">Monto</th>
			<th>Notas</th>
			@if(Auth::user()->rol == 'administrador')
			<th>Acción</th>
			@endif
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
				@if(isset($abono->cuenta_id))
					Cuenta
					{{$tercero->cuentas_array()[$abono->cuenta_id]}}
				@endif
			</td>
			<td class="text-right">{{number_format($abono->monto, 2, ',', '.')}}</td>
			<td>
				{{$abono->comprobante}} <br />
				{{$abono->notas}} <br />
				Responsable: {{$abono->user->nombre}}
			</td>
			@if(Auth::user()->rol == 'administrador')
			<td>
				<a href="{{route('editar_abono', ['id' => $abono->id])}}" class="btn btn-warning btn-sm">
					<span class="glyphicon glyphicon-edit"></span>
					Editar
				</a>
			</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>