<h1>{{$tercero->nombre}}</h1>

<dl class="dl-horizontal">
	<dt>NIT:</dt>
	<dd>{{$tercero->nit}}</dd>

	<dt>Dirección:</dt>
	<dd>{{$tercero->direccion}}</dd>

	<dt>Teléfono:</dt>
	<dd>{{$tercero->telefono}}</dd>

	<dt>Email:</dt>
	<dd>{{$tercero->email}}</dd>

</dl>

@if(isset($tercero->notas) && $tercero->notas != '')
<div class="well">
	{{nl2br($tercero->notas)}}
</div>
@endif