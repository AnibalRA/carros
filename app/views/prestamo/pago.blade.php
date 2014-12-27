@extends('prestamo/pasos')
@section('content_form')
<script type="text/javascript">
    if(history.forward(1))
        location.replace(history.forward(1))
</script>
<br/>
<br/>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forma de Pago</h3>
            </div>
            {{ Form::model($prestamo, $form_data) }}
                <div class="panel-body">
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('tipo_pago', 'Tipo de pago *', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-th-list"> </span>
                            {{ Form::select('tipo_pago', $data, null); }}
                            @if($errors->has('tipo_pago') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('descuento', 'Descuento', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-sort"> </span>
                            {{ Form::text('descuento', null, array('placeholder' => 'Descuento', 'class' => 'form-control')) }}
                            @if($errors->has('descuento') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('', 'AUTO', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('precio', $precioAuto, array('id' => 'precio' , 'class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('', 'EXTRA', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('extra', $precioExtras, array('id' => 'extra' , 'class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('', '', array('class' => 'control-label')) }}
                        <div class="input-group">
                            <a href="#" id='calcularTotal'>Calcular total</a>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        {{ Form::label('', 'TOTAL', array('class' => 'control-label')) }}
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('total', $total, array('id'=>'total','class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Finalizar', array('class' => 'btn btn-default')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="col-md-4">
        <div style="border-bottom: 1px inset #DDDDDD">
            <h4>Reserva</h4>
        </div>
        <br>
        <dl class="horizontal">
            <dd class='text-justify'><span class="glyphicon glyphicon-calendar"> </span> {{ Form::label('Fecha / Hora Reserva: ' . date('d-m-Y h:i A', strtotime($prestamo->horario_rsv))) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Fecha / Hora de Devolución: ' . date('d-m-Y h:i A', strtotime($prestamo->horario_dvl))) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Entrega: ' . $prestamo->lugarEntrega) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-home"> </span> {{ Form::label('Lugar de Devolución: ' . $prestamo->lugarDevolucion) }}</dd>
        </dl>
        <br>
        <div style="border-bottom: 1px inset #DDDDDD">
            <h4>Extras</h4>
        </div>
        <br/>
        @if(!empty($lista))
        <div class="form-group">
            <div class="input-group">
                <dl class="horizontal">
                    @foreach ($lista as $value)
                        <dd class='text-left'><span class="glyphicon glyphicon-record"> </span> {{ $value->extra }} ${{ $value->precio }}</dd>
                    @endforeach
                </dl>
            </div>
        </div>
        <br>
        @endif
        <div style="border-bottom: 1px inset #DDDDDD">
            <h4>Total</h4>
        </div>
        <dl class="horizontal">
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-calendar"> </span> {{ Form::label($dias . ' Días, Auto: $' . $precioDiaAuto . ' |' . ' Extras: $' . $precioDiaExtra) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label($horas . ' Horas, Auto: $' . $precioHoraAuto . ' |' . ' Extras $' . $precioHoraExtra) }}</dd>
            <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label('Extras Adicionales: $' . $precioUnico) }}</dd>
        </dl>
    </div>
    <div class="col-md-4">
        <div style="border-bottom: 1px inset #DDDDDD">
            <h4>Auto</h4>
        </div>
        <br>
        <dl class="horizontal">
            <div id="my_carusel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                   <!--  @foreach (Foto::where('modelo_id',$prestamo->modelo_id)->get() as $key => $fotos)
                        <div class="item @if($key == 0) {{ 'active' }} @endif">
                            <img alt='Foto del Auto' src='{{ asset("assets/img/$fotos->ruta_imagen") }}' class='img-responsive' />
                        </div>
                    @endforeach -->
                </div>
                <a class="left carousel-control" href="#my_carusel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#my_carusel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
            <br/>
            <dd class='text-justify'><span class="glyphicon glyphicon-usd"> </span>{{ $fotos->modelo->precios->first()->precio }}</dd>
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
</div>
@stop