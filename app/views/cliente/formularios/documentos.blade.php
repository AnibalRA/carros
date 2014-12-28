   
@extends('cliente/pasos')

@section('content_form')
<div class="row">
   <div class="col-md-6 col-sm-6 form-horizontal">
        {{Form::model($documento, $formData)}}
            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Documento</h3>

                </div>

                <div class="panel-body">
                  <!--   <div class="form-group">
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
                        {{ Form::label('pasaporte', 'Pasaporte', array('class' => 'control-label col-md-4 col-sm-4')) }}
                        <div class="col-md-7 col-sm-7 input-group">
                            <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                            {{ Form::text('pasaporte', null, array('placeholder' => 'Pasaporte', 'class' => 'form-control')) }}
                        </div>
                    </div>

                    <hr/>
                   

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

                    <hr/>

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


                    </div> -->

                        <div class="form-group">
                            {{ Form::label('tipoDocumento_id', 'Tipo *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-user"> </span>
                                {{ Form::select('tipoDocumento_id', $tipoDocumentos, null); }}
                                @if($errors->has('tipoDocumento_id') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('numero', 'Número *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-credit-card"> </span>
                                {{ Form::text('numero', null, array('placeholder' => 'Número de numero', 'class' => 'form-control')) }}
                                @if($errors->has('numero') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('emision', 'Fecha De Emisión', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                                {{ Form::text('emision', null, array('placeholder' => 'Fecha Emisión', 'class' => 'form-control datepicker')) }}
                                @if($errors->has('emision') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('vencimiento', 'Fecha De Vencimiento *', array('class' => 'control-label col-md-4 col-sm-4')) }}
                            <div class="col-md-7 col-sm-7 input-group">
                                <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
                                {{ Form::text('vencimiento', null, array('placeholder' => 'Fecha Vencimiento', 'class' => 'form-control datepicker')) }}
                                @if($errors->has('vencimiento') )
                                    <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>
                                @endif
                            </div>
                        </div>
                </div>

                <div class="panel-footer">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}

                </div>
            </div>

        {{Form::close()}}
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Documentos registrados</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>Tipo</td>
                        <td>Número</td>
                        <td>Vencimiento</td>
                        <td>Opcion</td>
                    </tr>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>{{$documento->tipo->tipo}}</td>
                            <td>{{$documento->numero}}</td>
                            <td>{{$documento->vencimiento}}</td>
                            <td>{{$documento->imagen}}</td>
                            <td>
                                <a href="{{ route('editarDocumento', $documento->id) }}" data-content="Editar"  class="glyphicon glyphicon-edit tool pull-left"> </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@stop
            