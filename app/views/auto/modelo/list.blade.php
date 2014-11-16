@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Modelos de Autos</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
               <a href="{{ route('modeloNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
            <div class="col-sm-offset-5 col-sm-6 hidden-lg">
                {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                    <div class="form-group input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}
                            {{ Form::hidden('tabla', 'Modelo', array('id' => 'tabla')) }}
                    </div>
                    <div class="btn-group">
                        {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-default')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr class="active">
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Fotos</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($modelo as $modelos)
                    <tr>
                        <td>
                            <a href="{{ route('modeloShow', $modelos->id) }}">{{ $modelos->modelo }}</a>
                        </td>
                        @if(!empty($modelos->tipo->tipo))
                            <td>{{ $modelos->tipo->tipo }}</td>
                        @endif
                        @if(!empty($modelos->marca->marca))
                            <td>{{ $modelos->marca->marca }}</td>
                        @endif
                        <td>
                            <a href="{{ route('fotoShow', $modelos->id) }}" class="showFoto" data-modal='#showImagen'>{{ $modelos->fotos->count() }}</a>
                        </td>
                        <td>
                            <a href="{{ route('modeloEditar', $modelos->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                            <a href="#" data-id="{{ $modelos->id }}" data-form="#form-mdl" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $modelo->links() }}
        {{ Form::open(array('route' => array('modeloDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-mdl')) }}
        {{ Form::close() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-12">
         @include('/cliente/modal/show')
    </div>
</div>
@stop