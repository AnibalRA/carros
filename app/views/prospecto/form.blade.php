@extends('index')

@section('content')
        <script type="text/javascript">
            if(history.forward(1))
                location.replace(history.forward(1))
        </script>
<br/>

<br/>

<div class="row">

    <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Datos del Prospecto</h3>

            </div>

            {{ Form::model($prospecto, $form_data) }}

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

                        {{ Form::label('direccion', 'Dirección *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-home"> </span>

                            {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '3', 'class' => 'form-control')) }}

                            @if($errors->has('direccion') )

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

                        {{ Form::label('fecha_nac', 'Fecha De Nacimiento', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>

                            {{ Form::text('fecha_nac', null, array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control datepicker')) }}

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

                    <div class="form-group">

                        {{ Form::label('celular', 'Celular', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-phone"> </span>

                            {{ Form::text('celular', null, array('placeholder' => 'Celular', 'class' => 'form-control')) }}

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