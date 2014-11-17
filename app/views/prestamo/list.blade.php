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
                        <td>{{ date('d-m-Y h:i A', strtotime($prestamos->horario_rsv)) }}</td>
                        <td>{{ date('d-m-Y h:i A', strtotime($prestamos->horario_dvl)) }}</td>
                        <td>{{ $prestamos->estado }}</td>
                        <td>
                            <a href="{{ route('contratoEditar', array($prestamos->id)) }}" data-content="Contrato de Arrendamiento" data-placement="bottom" class="crearContrato glyphicon glyphicon-file tool"> </a>
                            <a href="{{ route('contratoEditar', array($prestamos->id)) }}" data-content="Pagare" data-placement="bottom" class="crearPagare glyphicon glyphicon-file tool"> </a>
                            <a href="#" data-id="{{ $prestamos->id }}" data-form="#form-prt" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>
                            <a href="#" class="opc glyphicon glyphicon-chevron-up" data-content="
                                <a href={{ route('prestamoEditar', $prestamos->id) }}>Editar</a>
                                <br>
                                <a href={{ route('prestamoShow', $prestamos->id) }}>Ver</a>
                                @if($prestamos->estado == 'Pre-reservado')
                                    <br>
                                    <a href={{ route('prestamoConfirmar', array($prestamos->id,$prestamos->modelo_id)) }}>Confirmar Reserva</a>
                                @endif
                                @if($prestamos->estado == 'Pendiente de Pago')
                                    <br>
                                    <a href={{ route('prestamoRequerimiento', array($prestamos->id)) }}>Requerimiento de Pago</a>
                                @endif
                                ">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="panel-footer">
        {{ $prestamo->links() }}
        {{ Form::open(array('route' => array('prestamoDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prt')) }}
        {{ Form::close() }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-12">
         @include('prestamo/modal/modal')
         @include('prestamo/modal/modal2')
    </div>
</div>
@stop