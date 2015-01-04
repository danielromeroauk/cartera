<h2>Cartera por {{strtolower($cartera->documento)}} <small>a {{$tercero->nombre}}</small></h2>

<dl class="dl-horizontal">

	<dt>Fecha:</dt>
	<dd>{{date_format(new Datetime($cartera->created_at), 'Y-m-d')}}</dd>

	<dt>{{$cartera->prefijo}}</dt>
	<dd><strong>{{$cartera->fisico}}</strong></dd>

	<dt>Pedido:</dt>
	<dd>{{$cartera->pedido}}</dd>

	<dt>Valor:</dt>
	<dd>{{number_format($cartera->valor, 2, ',', '.')}}</dd>

	<dt>Notas:</dt>
	<dd>{{$cartera->notas}}</dd>

	<dt>Total abonado:</dt>
	<dd>{{number_format($cartera->totalAbonado(), 2, ',', '.')}}</dd>

	<dt>Saldo:</dt>
	<dd>{{number_format($cartera->saldo(), 2, ',', '.')}}</dd>

</dl>

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