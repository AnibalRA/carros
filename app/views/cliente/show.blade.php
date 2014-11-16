@extends('index')
@section('content')
<br/>
<div class="row"  style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <h3>Datos del Cliente</h3>
    </div>
    <div class="col-md-offset-3 col-md-3 col-sm-offset-3 col-sm-3 hidden-xs">
        <h3>Datos del Contácto</h3>
    </div>
    <div class="col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2 text-right col-xs-6">
        <br/>
        <a href="{{ route('clienteImagenes', $cliente->id) }}" class="showFoto" data-modal='#showImagen'>Imagenes</a> |
        <a href="{{ route('clienteEditar', $cliente->id) }}">Editar</a> |
        <a href="{{ route('clienteLista') }}" data-id="{{ $cliente->id }}" data-form="#form-clt" class="showBorrar">Borrar</a>
    </div>
</div>
<br/>
<div class="row" style="border-bottom: 1px inset #DDDDDD">
    <div class="col-md-6 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Nombre:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->nombre) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Dirección Local:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->direccion) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Dirección Extrangero:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->direccion_2) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Documento Identidad:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->doc_unico) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Sexo:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->sexo) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Correo Electrónico:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->email) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Nacimiento:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->fecha_nac) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Teléfono Local:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->telefono) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Teléfono Extrangero:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->telefono_2) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Celular:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->celular) }}</dd>
            </p>
        </dl>
    </div>
    <div class="col-md-6 col-sm-6">
        <dl class="dl-horizontal">
            <p>
                <dt class="text-left">{{ Form::label('Pasaporte:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->pasaporte) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Número Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->licencia) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Emi. Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label(date('d-m-Y', strtotime($cliente->fecha_emi_lic))) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Ven. Licencia:') }}</dt>
                <dd class="text-left">{{ Form::label(date('d-m-Y', strtotime($cliente->fecha_ven_lic))) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Tarjeta de Crédito:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->targeta_credito) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Fecha Ven. Tarj-Cred:') }}</dt>
                <dd class="text-left">{{ Form::label(date('d-m-Y', strtotime($cliente->fecha_ven_cre))) }}</dd>
            </p>
            <p>
                <dt class="text-left">{{ Form::label('Tipo Cliente:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->tipo) }}</dd>
            </p>
            <a href="#" id='caso'>En caso de emergencias cominicarse con:</a>
            <div id='emergencia' style='display:none'>
                <p>
                    <dt class="text-left">{{ Form::label('Nombre:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_nombre) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Dirección:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_direccion) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Teléfono:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_telefono) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Número Licencia:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_licencia) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Fecha Emi. Licencia:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_femilic) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Fecha Ven. Licencia:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->emergencia_fevenlic) }}</dd>
                </p>
            </div>
            <br/>
            <br/>
            <a href="#" id='conductor'>Conductor Adicional:</a>
            <div id='adicional' style='display:none'>
                <p>
                    <dt class="text-left">{{ Form::label('Nombre:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->adicional_nombre) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Documento Identidad:') }}</dt>
                    <dd class="text-left">{{ Form::label($cliente->doc_unico_2) }}</dd>
                </p>
                <p>
                    <dt class="text-left">{{ Form::label('Licencia:') }}</dt>
                    <dd class="text-left thumbnail">
                        <img class="img-responsive" src="{{ asset('assets/img/'.$cliente->ruta_imagen) }}" />
                    </dd>
                </p>
            </div>
        </dl>
    </div>
    {{ Form::open(array('route' => array('clienteDestroy', 'TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-clt')) }}
    {{ Form::close() }}
</div>
<br/>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <dl class="dl-horizontal">
            <p class="text-justify">
                <dt class="text-left">{{ Form::label('Comentario:') }}</dt>
                <dd class="text-left">{{ Form::label($cliente->comentario) }}</dd>
            </p>
        </dl>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-mds-12">
         @include('cliente/modal/show')
    </div>
</div>
@stop