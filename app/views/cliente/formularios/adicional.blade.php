@extends('cliente/pasos')
@section('content_form')
<br/>
<br/>
<div class="row">
    {{ Form::model($cliente, $form_data) }}
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos Adicionales</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('adicional_nombre', 'Nombre Completo', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-user"> </span>
                            {{ Form::text('adicional_nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('doc_unico_2', 'Doc. de Identidad', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('doc_unico_2', null, array('placeholder' => 'Documento de Identidad', 'class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('adicional_licencia', 'Número de Licencia *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('adicional_licencia', null, array('placeholder' => 'Número de Licencia', 'class' => 'form-control')) }}
                            @if($errors->has('adicional_licencia') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('adicional_femilic', 'Fecha De Emisión *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('adicional_femilic', null, array('placeholder' => 'Fecha Emisión / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('adicional_femilic') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('adicional_fevenlic', 'Fecha De Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                            {{ Form::text('adicional_fevenlic', null, array('placeholder' => 'Fecha Vencimiento / Licencia', 'class' => 'form-control datepicker')) }}
                            @if($errors->has('adicional_fevenlic') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Subir Imagen</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label(null, 'Subir Imagen', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            @if(!empty($cliente->ruta_imagen))
                                <div class="thumbnail">
                                    <img class="img-responsive" src="{{ asset('assets/img/'.$cliente->ruta_imagen) }}" />
                                </div>
                            @endif
                            <input id="ruta_imagen" name="ruta_imagen" type="file">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Siguiente', array('class' => 'btn btn-default')) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
</div>
@stop