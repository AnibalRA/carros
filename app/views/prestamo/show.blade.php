@extends('index')
@section('content')
<br/>
<br/>
<div class="row" >
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-10 col-xs-10">
                <h4>Cliente</h4>
            </div>
            <div class="col-md-2 col-sm-2 hidden-lg col-xs-2 hidden-sm">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <br/>
        <dl class="horizontal">
            <dd class='text-justify'><span class="glyphicon glyphicon-user"> </span> {{ Form::label('Nombre: ' . $prestamo->cliente->nombre) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-envelope"> </span> {{ Form::label('Correo Eléctronico: ' . $prestamo->cliente->email) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-phone-alt"> </span> {{ Form::label('Teléfono: ' . $prestamo->cliente->telefono) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-phone"> </span> {{ Form::label('Celular: ' . $prestamo->cliente->celular) }}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-10">
                <h4>Reserva</h4>
            </div>
            <div class="col-md-2 col-sm-2 hidden-lg hidden-xs">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-calendar"> </span> {{ Form::label('Fecha / Hora Reserva: ' . date('d-m-Y h:i A', strtotime($prestamo->horario_rsv))) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Fecha / Hora de Devolución: ' . date('d-m-Y h:i A', strtotime($prestamo->horario_dvl))) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Entrega: ' . $prestamo->lugarEntrega) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Devolución: ' . $prestamo->lugarDevolucion) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-credit-card"> </span> {{ Form::label('Tipo de Pago: ' . $prestamo->tipo_pago) }}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-10 col-sm-4">
                <h4>Total</h4>
            </div>
            <div class="col-md-2 col-sm-12 hidden-sm hidden-xs">
                <a href="{{ route('prestamoEditar', array($prestamo->id)) }}">Editar</a>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-calendar"> </span> {{ Form::label($dias . ' Días, Extra + Auto: $' . ($precioDiaAuto + $precioDiaExtra)) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label($horas . ' Horas, Extra + Auto: $' . ($precioHoraAuto + $precioHoraExtra)) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label('Extras Adicionales: $' . $precioUnico) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($prestamo->descuento . '%' . ' de Descuento: $' . $cantidadDescontar) }}</dd>
            <br>
            <dd class='text-justify'><span class="glyphicon glyphicon-usd"> </span> <strong>{{ Form::label('Total a Pagar: $' . $total) }}</strong></dd>
        </dl>
    </div>
</div>
<br/>
<div class="row" >
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-12 col-sm-12">
                <h4>Auto</h4>
            </div>
        </div>
        <br/>
        <dl class="horizontal">
            <div id="my_carusel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach (Foto::where('modelo_id',$prestamo->modelo_id)->get() as $key => $fotos)
                        <div class="item @if($key == 0) {{ 'active' }} @endif">
                            <img alt='Foto del Auto' src='{{ asset("assets/img/$fotos->ruta_imagen") }}' class='img-responsive' />
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#my_carusel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#my_carusel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-12 col-sm-12">
                <h4>Datos</h4>
            </div>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($fotos->modelo->modelo) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Año: ' . $fotos->modelo->año) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tasks"> </span> {{ Form::label('Motor: ' . $fotos->modelo->motor) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label('Transmisión: ' . $fotos->modelo->transmision) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($fotos->modelo->puertas . ' Puertas') }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Color: ' . $fotos->modelo->color) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($fotos->modelo->capacidad . ' Pasajeros') }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-road"> </span> {{ Form::label($fotos->modelo->km_galon . ' Km/g') }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Combustible: ' . $fotos->modelo->tipo_combustible) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-briefcase"> </span> {{ Form::label('Equipamiento: ' . $fotos->modelo->equipamiento) }}</dd>
        </dl>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="row" style="border-bottom: 1px inset #DDDDDD">
            <div class="col-md-12 col-sm-12">
                <h4>Extras</h4>
            </div>
        </div>
        <br/>
        <div class="form-group">
            <div class="input-group">
                <dl class="horizontal">
                    @foreach ($data as $key => $value)
                        <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ $value }}</dd>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-sm-12">
        <dl class="horizontal prestamoAccesorio"></dl>
    </div>
</div>
@stop