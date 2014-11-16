@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Clientes</h1>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
                <a href="{{ route('clienteNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
            <div class="col-sm-offset-5 col-sm-6 hidden-lg">
                {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                    <div class="form-group input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}
                            {{ Form::hidden('tabla', 'Cliente', array('id' => 'tabla')) }}
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
                    <th>Nombre</th>
                    <th>Documento Identidad</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($cliente as $clientes)
                <tr>
                    <td>
                        <a href="{{ route('clienteShow', $clientes->id) }}">{{ $clientes->nombre }}</a>
                    </td>
                    <td>{{ $clientes->doc_unico }}</td>
                    <td>{{ $clientes->email }}</td>
                    <td>
                        <a href="{{ route('clienteEditar', $clientes->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>
                        <a href="#" data-id="{{ $clientes->id }}" data-form="#form-clt" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $cliente->links() }}
        {{ Form::open(array('route' => array('clienteDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-clt')) }}
        {{ Form::close() }}
    </div>
</div>
@stop