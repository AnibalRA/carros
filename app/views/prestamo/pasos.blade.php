@extends('index')
@section('content')
    <br/>

    <?php
        $pasos  = array(
                        array(
                            "label"  => "Fechas",
                            "enlace" => "prestamoEditar"
                        ),
                        array(
                            "label" => "Carro",
                            "enlace" => "selectModelo"
                        ),
                        array(
                            "label" => "Extras",
                            "enlace" => "selectExtras"
                        ),
                        array(
                            "label" => "Pago",
                            "enlace" => "formaPago"
                        ),
                        array(
                            "label" => "Contrato",
                            "enlace" => "prestamoEditar"
                        ),
                        array(
                            "label" => "Devolver",
                            "enlace" => "prestamoEditar"
                        )
                    );
        $step = 1;
    ?>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                @foreach($pasos as $pass)
                    <li class="text-center col-md-2 @if($paso == $step) active @endif">
                        <a href="@if($prestamo->estado_id + 1 >= $step) {{ route($pass['enlace'], $prestamo->id) }} @endif">
                            <span class="@if($paso == $step) glyphicon glyphicon-pencil @endif"> </span>
                            Paso {{$prestamo->estado_id}} - {{$step}}: {{$pass['label']}}
                        </a>
                    </li> 
                    <?php $step++; ?>
                @endforeach
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop