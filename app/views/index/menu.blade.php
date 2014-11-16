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
            <li>{{ HTML::link(route('clienteLista'), 'Clientes') }}</li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Autos<strong class="caret"></strong></a>
                <ul class="dropdown-menu">
                    <li>{{ HTML::link('/marca', 'Marca') }}</li>
                    <li>{{ HTML::link('tipo', 'Tipo') }}</li>
                    <li>{{ HTML::link(route('modeloLista'), 'Modelos') }}</li>
                    <li class="divider"></li>
                    <li>{{ HTML::link('extra', 'Extras / Servicios') }}</li>
                </ul>
            </li>
            <li>{{ HTML::link('prestamo', 'Prestamos') }}</li>
            <li>{{ HTML::link('boletin', 'Boletin') }}</li>
            <li>{{ HTML::link('prospecto', 'Prospectos') }}</li>
        </ul>
        <div class="hidden-sm hidden-xs">
            {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                <div class="form-group input-group">
                    <span class="input-group-addon glyphicon glyphicon-search"> </span>
                    {{ Form::text('buscar', null, array('id' => 'buscar','placeholder' => 'Buscar', 'class' => 'form-control')) }}
                </div>
                <div class="btn-group">
                    {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ Form::radio('tabla', 'User', true) }}Usuario</li>
                        <li>{{ Form::radio('tabla', 'Cliente') }}Cliente</li>
                        <li>{{ Form::radio('tabla', 'Marca') }}Marca</li>
                        <li>{{ Form::radio('tabla', 'Tipo') }}Tipo</li>
                        <li>{{ Form::radio('tabla', 'Modelo') }}Modelo</li>
                        <li>{{ Form::radio('tabla', 'Extra') }}Extra</li>
                    </ul>
                </div>
            {{ Form::close() }}
        </div>
        <?php
            $name = explode(" ", Auth::user()->nombre);
            $name = $name[0]. ' '.end($name);
        ?>
        <ul class="nav navbar-nav navbar-right">
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