<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <img class="img-responsive hidden-xs" alt="600x300" src="{{ asset('assets/img/logo-multiautos1.png') }}">
    </div>
    <div class="collapse navbar-collapse navbar-inverse-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            
            <!-- <li class="dropdown"> -->
               <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contactos<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                   
                </ul> -->
                <li>{{ HTML::link(route('prestamoLista'), 'Prestamos') }}</li>
                <li>{{ HTML::link(route('clienteLista'), 'Clientes') }}</li>
                <li>{{ HTML::link(route('prospectoList'), 'Prospectos') }}</li>
                <!-- <li>{{ HTML::link('boletin', 'Boletin') }}</li> -->
            </li>
           <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::link('/marca', 'Marca') }}</li>
                    <li>{{ HTML::link('tipo', 'Tipo') }}</li>
                    <li>{{ HTML::link(route('carros'), 'Modelos') }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::link('extra', 'Extras / Servicios') }}</li>
                </ul>
            </li> -->
            <li>{{ HTML::link(route('carros'), 'Carros') }}</li>
            <li>{{ HTML::link(route('extra'), 'Extras / Servicios') }}</li>
        </ul>
        <?php
            $name = explode(" ", Auth::user()->nombre);
            $name = $name[0]. ' '.end($name);
        ?>
        <ul class="nav navbar-nav navbar-right">
            <li>{{ HTML::link('buscar-cliente', 'Busqueda Avanzada') }}</li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $name }} <strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::link('user', 'Usuarios'); }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::link('/logout', 'Cerrar Sesión'); }}</li>
                </ul>
            </li>
        </ul>
    </div>
</nav>