@extends('master')

@section('content')

<h1>Terceros</h1>

@include('partials.tercero_buscar_form')

@if(Session::has('mensaje'))
<div class="alert alert-info">
	<p>{{Session::get('mensaje')}}</p>
</div>
@endif

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>NIT</th>
			<th>Nombre</th>
			<th>Acción</th>
		</tr>
	</thead>
	<tbody>
	@foreach($terceros as $tercero)
		<tr>
			<td>{{$tercero->nit}}</td>
			<td>{{$tercero->nombre}}</td>
			<td>
				<a class="btn btn-info btn-sm" href="{{route('mostrar_tercero', ['id' => $tercero->id])}}">
					<span class="glyphicon glyphicon-search"></span>
					Ver más
				</a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

{{$terceros->appends(Input::except('page'))->links()}}

@stop