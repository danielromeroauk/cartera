@extends('master')

@section('content')

<div class="row">

	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

	<div class="col-md-10">
		@include('partials.tercero_datos')
		@include('partials.tercero_cuentas_bancarias')
	</div>

</div> {{-- /.row --}}

@stop