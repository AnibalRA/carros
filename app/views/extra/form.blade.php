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

                <h3 class="panel-title">Extra / Servicio</h3>

            </div>

            {{ Form::model($extra, $form_data) }}

                <div class="panel-body">

                    <div class="form-group">

                        {{ Form::label('extra', 'Extra *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-briefcase"> </span>

                            {{ Form::text('extra', null, array('placeholder' => 'Extra', 'class' => 'form-control')) }}

                            @if($errors->has('extra') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('descripcion', 'Descripción *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-comment"> </span>

                            {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripción', 'rows' => '3', 'class' => 'form-control')) }}

                            @if($errors->has('descripcion') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('precio', 'Precio *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>

                            {{ Form::text('precio', null, array('placeholder' => 'Precio', 'class' => 'form-control', 'data-mask'=> '999.99')) }}

                            @if($errors->has('precio') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label(null, 'Subir Imagen *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            @if(!empty($extra->ruta_imagen))

                                <div class="thumbnail">

                                    <img class="img-responsive" src="{{ asset('assets/img/'.$extra->ruta_imagen) }}" />

                                </div>

                            @endif

                            <input id="ruta_imagen" name="ruta_imagen" type="file">

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            {{ Form::checkbox('obligatorio', true) }} Obligatorio

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            {{ Form::checkbox('cobro', true) }} Cobrar servicio solo una vez

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