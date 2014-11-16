@extends('index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class='text-center'>Prestamos</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        @if(Session::has('mensaje'))
            <div class="alert {{Session::get('color')}}">
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
                <a href="{{ route('prestamoNuevo') }}" class="btn btn-default">
                    <span class="glyphicon glyphicon-file"></span> Nuevo
                </a>
            </div>
            <div class="col-sm-offset-5 col-sm-6 hidden-lg">
                {{ Form::open(array('url' => '/buscar/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}
                    <div class="form-group input-group">
                        <span class="input-group-addon glyphicon glyphicon-search"> </span>
                            {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}
                            {{ Form::hidden('tabla', 'Prestamo', array('id' => 'tabla')) }}
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
                    <th>Cliente</th>
                    <th>Modelo</th>
                    <th>Horario de Reserva</th>
                    <th>Horario de Devolución</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($prestamo as $prestamos)
                    <tr>
                        <td>
                            @if(!empty($prestamos->cliente->nombre))
                                {{ $prestamos->cliente->nombre }}
                            @endif
                        </td>
                        <td>
                            @if(!empty($prestamos->modelo->modelo))
                                {{ $prestamos->modelo->modelo }}
                            @endif
                        </td>
                        <td>{{ date('d/m/y h:i A', strtotime($prestamos->horario_rsv)) }}</td>
                        <td>{{ date('d/m/y h:i A', strtotime($prestamos->horario_dvl)) }}</td>
                        <td>{{ $prestamos->estado }}</td>
                        <td>
                            @if($prestamos->estado == 'Pre-reservado')
                                <a href="{{ route('prestamoConfirmar', array($prestamos->id,$prestamos->modelo_id)) }}" data-content="Confirmar Reserva" data-placement="bottom" class="glyphicon glyphicon-ok tool"> </a>
                            @endif
                            @if($prestamos->estado == 'Pendiente de Pago')
                                <a href="{{ route('prestamoRequerimiento', array($prestamos->id)) }}" data-content="Enviar requerimiento de pago al cliente" data-placement="bottom" class="glyphicon glyphicon-envelope"> </a>
                                <a href="{{ route('contratoEditar', array($prestamos->id)) }}" data-content="Contrato de Arrendamiento" data-placement="bottom" class="crearContrato glyphicon glyphicon-print tool"> </a>
                            @endif
                            <a href="{{ route('prestamoEditar', $prestamos->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool "> </a>
                            <a href="{{ route('prestamoShow', $prestamos->id) }}" data-content="Ver" data-placement="bottom" class="glyphicon glyphicon-eye-open tool"> </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $prestamo->links() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-12">
         @include('prestamo/modal/modal')
    </div>
</div>
@stop