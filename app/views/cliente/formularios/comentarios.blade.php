@extends('cliente/pasos')
@section('content_form')
    <br/>
    <br/>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Comentario..</h3>
                </div>
                {{ Form::model($cliente, $form_data) }}
                    <div class="panel-body">
                        <div class="form-group col-md-12 col-sm-12">
                            {{ Form::label('comentario', 'Comentario..', array('class' => 'control-label')) }}
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-file"> </span>
                                {{ Form::textarea('comentario', null, array('placeholder' => 'Comentario', 'rows' => '5', 'class' => 'form-control')) }}
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