@extends('prestamo/pasos')

@section('content_form')
        <script type="text/javascript">
            if(history.forward(1))
                location.replace(history.forward(1))
        </script>
<br/>

<br/>

@foreach ($modelo as $modelos)

    <div class="row" style="border-bottom: 1px inset #DDDDDD">

        <dl class="horizontal">

            <div class="col-md-3 col-sm-3">

                <div id="my_carusel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">

                        @foreach ($modelos->fotos as $key => $fotos)

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

            </div>

            <div class="col-md-3 col-sm-3">

                <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($modelos->modelo) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-time"> </span> {{ Form::label('Año: ' . $modelos->año) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-tasks"> </span> {{ Form::label('Motor: ' . $modelos->motor) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label('Transmisión: ' . $modelos->transmision) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($modelos->puertas . ' Puertas') }}</dd>

            </div>

            <div class="col-md-3 col-sm-3">

                <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Color: ' . $modelos->color) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-record"> </span> {{ Form::label($modelos->capacidad . ' Pasajeros') }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-road"> </span> {{ Form::label($modelos->km_galon . ' Km/g') }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-tint"> </span> {{ Form::label('Combustible: ' . $modelos->tipo_combustible) }}</dd>

                <dd class='text-justify'><span class="glyphicon glyphicon-briefcase"> </span> {{ Form::label('Equipamiento: ' . $modelos->equipamiento) }}</dd>

            </div>

            <div class="col-md-3 col-sm-3">

                @if($modelos->id != $idexiste)

                    <a href="{{ route('selectAuto', array($prestamo->id,$modelos->id,$modelos->precios->first()->id)) }}" class="btn btn-danger">

                        Seleccionar <br/>

                        Precio: <span class="glyphicon glyphicon-usd"> </span> {{ $modelos->precio }}

                    </a>

                @else

                    <a href="{{ route('quitarModelo', $prestamo->id) }}" class="btn btn-primary">

                        Seleccionado <br/>

                        Precio: <span class="glyphicon glyphicon-usd"> </span> {{ $modelos->precio}}

                    </a>

                @endif

            </div>

        </dl>

    </div>

    <br/>

@endforeach

<br/>

<div class="row">

    <div class="col-md-2 col-sm-5">

        {{ $modelo->links() }}

    </div>

</div>

@stop