@extends('cliente/pasos')
@section('content_form')
<br/>
<br/>
<div class="row">
    {{ Form::model($cliente, $form_data) }}
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del Cliente</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('nombre', 'Nombre Completo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::text('nombre', Input::old('nombre'), array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                            @if($errors->has('nombre') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', 'Dirección 1 *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección Local', 'rows' => '3', 'class' => 'form-control')) }}
                            @if($errors->has('direccion') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion_2', 'Dirección 2', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-home"> </span>
                            {{ Form::textarea('direccion_2', null, array('placeholder' => 'Dirección en el Extrangero', 'rows' => '3', 'class' => 'form-control')) }}
                            @if($errors->has('direccion_2') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('doc_unico', 'Doc. de Identidad *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('doc_unico', null, array('placeholder' => 'Documento de Identidad', 'class' => 'form-control')) }}
                            @if($errors->has('doc_unico') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('sexo', 'Sexo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::select('sexo', $sexo, null); }}
                            @if($errors->has('sexo') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Correo Electrónico', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-envelope"> </span>
                            {{ Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) }}
                            @if($errors->has('email') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('celular', 'Celular', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone"> </span>
                            {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', 'Teléfono Local *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                            {{ Form::text('telefono', null, array('placeholder' => 'Teléfono Local', 'class' => 'form-control')) }}
                            @if($errors->has('telefono') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Datos del Contacto--}}
        <div class="col-md-6 col-sm-6 form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del Cliente</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('telefono_2', 'Teléfono del Extrangero', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                            {{ Form::text('telefono_2', null, array('placeholder' => 'Teléfono del Extrangero', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_nac', 'Fecha De Nacimiento', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fecha_nac', null, array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control datepicker')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('pasaporte', 'Pasaporte', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('pasaporte', null, array('placeholder' => 'Pasaporte', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('licencia', 'Número de Licencia *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('licencia', null, array('placeholder' => 'Número de Licencia', 'class' => 'form-control')) }}
                            @if($errors->has('licencia') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_emi_lic', 'Fecha De Emisión *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fecha_emi_lic', null, array('placeholder' => 'Fecha Emisión / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('fecha_emi_lic') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_ven_lic', 'Fecha De Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fecha_ven_lic', null, array('placeholder' => 'Fecha Vencimiento / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('fecha_ven_lic') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('targeta_credito', 'Tarjeta de Crédito *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('targeta_credito', null, array('placeholder' => 'Tarjeta de Crédito', 'class' => 'form-control')) }}
                            @if($errors->has('targeta_credito'))
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_ven_cre', 'Fecha De Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('fecha_ven_cre', null, array('placeholder' => 'Fecha Vencimiento / Tarjeta de Crédito', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('fecha_ven_cre') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tipo', 'Tipo de Cliente *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::select('tipo', $tipo, null); }}
                            @if($errors->has('tipo') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop