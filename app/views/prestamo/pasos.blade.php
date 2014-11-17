@extends('index')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="text-center col-md-3 @if($paso == 1 || $paso == 5) {{'active'}} @endif">
                    <a href="@if($paso != 1) {{ route('prestamoEditar', $prestamo->id) }} @endif">
                        <span class="@if($paso == 1 || $paso >= 5) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 1: Reservación
                    </a>
                </li>
                <li class="text-center col-md-3 @if($paso == 2 || $paso == 6) {{'active'}} @endif">
                    <a href="@if($paso > 2) {{ route('selectModelo', $prestamo->id) }} @endif">
                        <span class="@if($paso == 2 || $paso == 6) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 2: Seleccionar Auto
                    </a>
                </li>
                <li class="text-center col-md-3 @if($paso == 3) {{'active'}} @endif">
                    <a href="@if($paso >= 3) {{ route('selectExtras', $prestamo->id) }} @endif">
                        <span class="@if($paso == 3) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 3: Agregar Accesorios
                    </a>
                </li>
                <li class="text-center col-md-3 @if($paso == 4) {{'active'}} @endif">
                    <a href="@if($paso >= 3) {{ route('formaPago', $prestamo->id) }} @endif">
                        <span class="@if($paso == 4) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 4: Forma de Pago
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop