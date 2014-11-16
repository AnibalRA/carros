@extends('prestamo/pasos')
@section('content_form')
<br/>
<br/>
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-1 col-sm-10 col-sm-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forma de Pago</h3>
            </div>
            {{ Form::model($prestamo, $form_data) }}
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('tipo_pago', 'Tipo de pago *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-th-list"> </span>
                            {{ Form::select('tipo_pago', $data, null); }}
                            @if($errors->has('tipo_pago') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('descuento', 'Descuento', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-sort"> </span>
                            {{ Form::text('descuento', null, array('placeholder' => 'Descuento', 'class' => 'form-control')) }}
                            @if($errors->has('descuento') )
                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('', 'AUTO', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('precio', $precioAuto, array('id' => 'precio' , 'class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('', 'EXTRA', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('extra', $precioExtras, array('id' => 'extra' , 'class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('', '', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <a href="#" id='calcularTotal'>Calcular total</a>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('', 'TOTAL', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>
                            {{ Form::text('total', $total, array('id'=>'total','class' => 'form-control','disabled')) }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    {{ Form::submit('Finalizar', array('class' => 'btn btn-default')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop