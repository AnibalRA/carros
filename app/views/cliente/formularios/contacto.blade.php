@extends('cliente/pasos')
@section('content_form')
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos del Contacto</h3>
                </div>
                {{ Form::model($cliente, $form_data) }}
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('emergencia_nombre', 'Nombre Completo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::text('emergencia_nombre', null, array('placeholder' => 'Nombre Completo', 'class' => 'form-control')) }}
                                @if($errors->has('emergencia_nombre') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('emergencia_direccion', 'Dirección  *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-home"> </span>
                                {{ Form::textarea('emergencia_direccion', null, array('placeholder' => 'Dirección', 'rows' => '3', 'class' => 'form-control')) }}
                                @if($errors->has('emergencia_direccion'))
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('emergencia_telefono', 'Teléfono *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-phone-alt"> </span>
                                {{ Form::text('emergencia_telefono', null, array('placeholder' => 'Teléfono', 'class' => 'form-control')) }}
                                @if($errors->has('emergencia_telefono') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop