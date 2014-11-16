@extends('auto/modelo/pasos')
@section('content_form')
<br/>
<br/>
<div class="row">
    {{ Form::model($modelo, $form_data) }}
        <div class="col-md-6 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Modelo del Auto</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('marca_id', 'Marca *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-tag"> </span>
                            {{ Form::select('marca_id', $marca, null) }}
                            @if($errors->has('marca_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tipo_id', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::select('tipo_id', $tipo, null) }}
                            @if($errors->has('tipo_id') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('modelo', 'Modelo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::text('modelo', null, array('placeholder' => 'Modelo', 'class' => 'form-control')) }}
                            @if($errors->has('modelo') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('año', 'Año *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-time"> </span>
                            {{ Form::text('año', null, array('placeholder' => 'Año', 'class' => 'form-control')) }}
                            @if($errors->has('año') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('motor', 'Motor *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-tasks"> </span>
                            {{ Form::text('motor', null, array('placeholder' => 'Motor', 'class' => 'form-control')) }}
                            @if($errors->has('motor') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('transmision', 'Transmisión *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::text('transmision', null, array('placeholder' => 'Transmisión', 'class' => 'form-control')) }}
                            @if($errors->has('transmision') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('puertas', 'Puertas *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::text('puertas', null, array('placeholder' => 'Numero de puertas', 'class' => 'form-control')) }}
                            @if($errors->has('puertas') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('color', 'Color', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-tint"> </span>
                            {{ Form::text('color', null, array('placeholder' => 'Color', 'class' => 'form-control')) }}
                            @if($errors->has('color') )
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
                    <h3 class="panel-title">Nuevo Auto</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('capacidad', 'Capacidad *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-record"> </span>
                            {{ Form::text('capacidad', null, array('placeholder' => 'Capacidad', 'class' => 'form-control')) }}
                            @if($errors->has('capacidad') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('km_galon', 'Kilómetro por galón *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-road"> </span>
                            {{ Form::text('km_galon', null, array('placeholder' => 'Kilómetro por galón', 'class' => 'form-control')) }}
                            @if($errors->has('km_galon') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tipo_combustible', 'Tipo de Combustible *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-tint"> </span>
                            {{ Form::text('tipo_combustible', null, array('placeholder' => 'Tipo de Combustible', 'class' => 'form-control')) }}
                            @if($errors->has('tipo_combustible') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('equipamiento', 'Equipamiento', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-briefcase"> </span>
                            {{ Form::textarea('equipamiento', null, array('placeholder' => 'Equipamiento', 'rows' => '3', 'class' => 'form-control')) }}
                            @if($errors->has('equipamiento') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('existencias', 'Existencias *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-shopping-cart"> </span>
                            {{ Form::text('existencias', null, array('placeholder' => 'Existencias', 'class' => 'form-control')) }}
                            @if($errors->has('existencias') )
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