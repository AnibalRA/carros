@extends('index')
@section('content')
    <br/><br/>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <ul class="nav nav-tabs">
                <li class="text-center col-md-4 col-sm-4 @if($paso == 1 || $paso == 4) {{'active'}} @endif">
                    <a href="@if($paso != 1) {{ route('modeloEditar',$modelo->id) }} @endif">
                        <span class="@if($paso == 1 || $paso == 4) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 1: Modelo del Auto
                    </a>
                </li>
                <li class="text-center col-md-4 col-sm-4 @if($paso == 2) {{'active'}} @endif">
                    <a href="@if($paso > 2) {{ route('modeloFoto',$modelo->id) }} @endif">
                        <span class="@if($paso == 2) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 2: Subir Fotos
                    </a>
                </li>
                <li class="text-center col-md-4 col-sm-4 @if($paso == 3) {{'active'}} @endif">
                    <a href="@if($paso >= 2) {{ route('modeloPrecio',$modelo->id) }} @endif">
                        <span class="@if($paso == 3) glyphicon glyphicon-pencil @endif"> </span>
                        Paso 3: Precios
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @yield('content_form')
@stop