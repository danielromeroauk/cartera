<h2>Cartera por {{strtolower($cartera->documento)}} <small>a {{$tercero->nombre}}</small></h2>

<div class="row">
	<div class="col-sm-6">
		<table class="table table-striped table-bordered">
			<tr>
				<th class="text-right">Fecha de emisión:</th>
				<td>{{date_format(new Datetime($cartera->created_at), 'Y-m-d')}}</td>
			</tr>
			<tr>
				<th class="text-right">Tiempo transcurrido:</th>
				<td>{{$cartera->tiempo_transcurrido(null, null, true)}} días</td>
			</tr>
			<tr>
				<th class="text-right">Responsable:</th>
				<td>{{$cartera->user->nombre}}</td>
			</tr>
		</table>
	</div>

	<div class="col-sm-4">
			<table class="table table-striped table-bordered">
			<tr>
				<th class="text-right">{{$cartera->prefijo}}:</th>
				<td class="text-right"><strong>{{$cartera->fisico}}</strong></td>
			</tr>
			<tr>
				<th class="text-right">Pedido:</th>
				<td>{{$cartera->pedido}}</td>
			</tr>
			<tr>
				<th class="text-right">Valor:</th>
				<td class="text-right">{{number_format($cartera->valor, 2, ',', '.')}}</td>
			</tr>
			<tr>
				<th class="text-right">Abonado:</th>
				<td class="text-right">{{number_format($cartera->totalAbonado(), 2, ',', '.')}}</td>
			</tr>
			<tr>
				<th class="text-right">Saldo:</th>
				<td class="text-right">{{number_format($cartera->saldo(), 2, ',', '.')}}</td>
			</tr>
			<tr>
				<th class="text-right">Fecha de vencimiento:</th>
				<td class="text-right">{{date_format(new Datetime($cartera->vencimiento), 'Y-m-d')}}</td>
			</tr>

		</table>
	</div>
</div>

@if(isset($cartera->notas) && $cartera->notas != '')
<div class="alert alert-success">
	Notas: <br />
	{{nl2br($cartera->notas)}}
</div>
@endif

@if(Auth::user()->rol == 'administrador')
<div class="well">
	<div class="row">

			<a href="{{route('editar_cartera', ['id' => $cartera->id])}}" class="btn btn-warning btn-sm">
				<span class="glyphicon glyphicon-edit"></span>
				Editar cartera
			</a>

			<a href="{{route('abonar_cartera', ['cartera_id' => $cartera->id])}}" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-credit-card"></span>
				Abonar
			</a>

	</div>
</div>
@endif