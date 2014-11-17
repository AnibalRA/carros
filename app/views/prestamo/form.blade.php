@extends('prestamo/pasos')

@section('content_form')
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

                <h3 class="panel-title">Lugar y fecha</h3>

            </div>

            {{ Form::model($prestamo, $form_data) }}

                <div class="panel-body">

                    <div class="form-group">

                        {{ Form::label('cliente_id', 'Nombre *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-user"> </span>

                            {{ Form::select('cliente_id', $cliente, null); }}

                            @if($errors->has('cliente_id') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('horario_rsv', 'Reserva *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>

                            {{ Form::text('horario_rsv', null, array('placeholder' => 'Fecha / Hora de Reserva', 'class' => 'form-control timepicker')) }}

                            @if($errors->has('horario_rsv') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('horario_dvl', 'Devolución *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-time"> </span>

                            {{ Form::text('horario_dvl', null, array('placeholder' => 'Fecha / Hora de Devolución', 'class' => 'form-control timepicker')) }}

                            @if($errors->has('horario_dvl') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('lugarEntrega', 'Lugar de Entrega *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-home"> </span>

                            {{ Form::select('lugarEntrega', $entrega, null); }}

                            @if($errors->has('lugarEntrega') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <input type="checkbox" name="campoDevolver" id="campoDevolver" checked> Devolver en ubicación diferente

                        </div>

                    </div>

                    <div class="form-group" id='devolverLugar'>

                        {{ Form::label('lugarDevolucion', 'Lugar de Devolución', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-home"> </span>

                            {{ Form::select('lugarDevolucion', $devolucion, null); }}

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