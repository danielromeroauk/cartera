@extends('master')

@section('content')

<div class="row">

	<div class="col-md-2">
		@include('partials.tercero_menu')
	</div>

	<div class="col-md-10">
		@include('partials.tercero_carteras')
	</div>

</div> {{-- /.row --}}

@stop