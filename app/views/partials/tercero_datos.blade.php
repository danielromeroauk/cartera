<h1>{{$tercero->nombre}}</h1>

<dl class="dl-horizontal">
	<dt>NIT:</dt>
	<dd>{{$tercero->nit}}</dd>

	<dt>Dirección:</dt>
	<dd>{{$tercero->direccion}}</dd>

	<dt>Teléfono:</dt>
	<dd>{{$tercero->telefono}}</dd>

	<dt>Correo electrónico:</dt>
	<dd>{{$tercero->email}}</dd>

	<dt>Notas:</dt>
	<dd>{{nl2br($tercero->notas)}}</dd>
</dl>