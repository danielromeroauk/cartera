<nav class="navbar navbar-default" role="navigation" id="menu-top">
  <div class="container-fluid">
    {{-- <!-- Brand and toggle get grouped for better mobile display --> --}}
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Mostrar/Ocultar menú</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">
        <img title="Logo Distrigases" alt="Logo Distrigases" src="{{ url('img/logo-distrigases.png') }}" />
        <span>APLICACIÓN DE CARTERA</span>
      </a>
    </div>

    {{-- <!-- Collect the nav links, forms, and other content for toggling --> --}}
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-briefcase"></span>
			Cuentas <b class="caret"></b>
		  </a>

		  <ul class="dropdown-menu">
			<li>
			  <a href="{{route('cartera_general', ['documento' => 'PAGAR'])}}">
				Resumen por pagar
			  </a>
			</li>
			<li>
			  <a href="{{route('vencimientos', ['documento' => 'PAGAR'])}}">
				Vencimientos por pagar
			  </a>
			</li>

			<li class="divider"></li>

			<li>
			  <a href="{{route('cartera_general', ['documento' => 'COBRAR'])}}">
				Resumen por cobrar
			  </a>
			</li>
			<li>
			  <a href="{{route('vencimientos', ['documento' => 'COBRAR'])}}">
				Vencimientos por cobrar
			  </a>
			</li>
		  </ul>

		</li>

		<li>
		  <a href="{{route('listado_de_terceros')}}">
			  <span class="glyphicon glyphicon-eye-open"></span>
			  Terceros
		  </a>
		</li>

	  	<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              {{ strtoupper(Auth::user()->nombre) }} <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
              <li>
                <a href="{{route('cambiar_password')}}">
                  <span class="glyphicon glyphicon-lock"></span>
                  Cambiar password</a>
              </li>

              <li class="divider"></li>

              <li>
                <a href="{{ route('logout') }}">
                  <span class="glyphicon glyphicon-off"></span>
                  Cerrar sesión</a>
              </li>
            </ul>
	  	</li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
