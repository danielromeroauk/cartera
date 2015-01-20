<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>
	@section('title') Cartera @show
</title>

{{HTML::style('bootstrap/css/bootstrap-united.min.css')}}
{{HTML::style('css/main.css')}}
@yield('styles')
</head>
<body>
@if(Auth::check())
	@include('partials.menu')
@endif

<div class="container-fluid">
	@yield('content')
</div>

{{HTML::script('js/jquery-1.11.1.min.js')}}
{{HTML::script('bootstrap/js/bootstrap.min.js')}}
{{HTML::script('js/main.js')}}
@yield('scripts')

@include('analyticstracking')
</body>
</html>