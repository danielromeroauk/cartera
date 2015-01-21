@extends('master')

@section('content')

<h1>Vencimientos por {{strtolower($documento)}}</h1>

<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Vencimiento</th>
			<th class="text-center">Tiempo transcurrido</th>
			<th>Tercero</th>
			<th>Documento</th>
			<th class="text-right">Valor</th>
			<th class="text-right">Abonado</th>
			<th class="text-right">Saldo</th>
		</tr>
	</thead>
	<tbody>
		@foreach($carteras as $cartera)

			@if($cartera->saldo() == 0)
				<?php continue; ?>
			@endif
		<tr>
			<td>{{date_format(new Datetime($cartera->vencimiento), 'Y-m-d')}}</td>
			<td class="text-center">{{$cartera->tiempo_transcurrido(null, null, true)}} días</td>
			<td>{{$cartera->tercero->nombre}}</td>
			<td>
				<a class="btn btn-info btn-sm" href="{{route('mostrar_abonos', ['cartera_id' => $cartera->id])}}">
					{{$cartera->prefijo}}
					{{$cartera->fisico}}
				</a>
			</td>
			<td class="text-right">
				{{number_format($cartera->valor, 2, ',', '.')}}
			</td>
			<td class="text-right">
				{{number_format($cartera->totalAbonado(), 2, ',', '.')}}
			</td>
			<td class="text-right">
				{{number_format($cartera->saldo(), 2, ',', '.')}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{$carteras->links()}}

@stop