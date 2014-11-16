@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Marcas de Autos</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        @if(Session::has('mensaje'))
            <div class="alert {{ Session::get('clase') }}">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('mensaje') }}
            </div>
        @endif
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12 col-sm-1">
            <p class="hidden-lg"></p>
                <a href='#' class="btn btn-default" data-toggle="modal" data-target="#crearMarca" id='modalFormMarca'>
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
            <div class="col-sm-offset-5 col-sm-6 hidden-lg">
                {{ Form::open(array('url' => '/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                    <div class="form-group input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}
                            {{ Form::hidden('tabla', 'Marca', array('id' => 'tabla')) }}
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
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($marca as $marcas)
                    <tr>
                        <td>
                            <a href="{{ route('marcaShow', array($marcas->id)) }}">{{ $marcas->marca }}</a></td>
                        <td>{{ $marcas->modelos->count() }}</td>
                        <td>
                            <a href="{{ route('marcaEditar', array($marcas->id)) }}" data-content="Editar" data-placement="bottom" class="crearMarca glyphicon glyphicon-edit tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $marca->links() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-12">
         @include('auto/marca/modal/form')
    </div>
</div>
@stop