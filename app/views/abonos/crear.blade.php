@extends('master')

@section('content')

<h1>Crear abono para la {{$cartera->prefijo}} {{$cartera->fisico}} <small>de {{$tercero->nombre}}</small></h1>
<div class="well">
	<div class="row">

		<div class="col-sm-4">
			Valor total: {{number_format($cartera->valor, 2, ',', '.')}}
		</div>

		<div class="col-sm-4">
			Abonado: {{number_format($cartera->totalAbonado(), 2, ',', '.')}}
		</div>

		<div class="col-sm-4">
			Saldo: {{number_format($cartera->saldo(), 2, ',', '.')}}
		</div>

	</div>
</div>

{{Form::open(['route' => 'guardar_abono', 'role' => 'form', 'method' => 'POST'])}}

	{{Form::hidden('cartera_id', $cartera->id)}}

	@include('partials.abono_form')

	@include('partials.btnguardar')

{{Form::close()}}

@stop