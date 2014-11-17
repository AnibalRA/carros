@extends('auto/modelo/pasos')

@section('content_form')
        <script type="text/javascript">
            if(history.forward(1))
                location.replace(history.forward(1))
        </script>
<br/>

<br/>

<div class="row">

    <div class="col-md-6 col-sm-6">

        {{ Form::model($precio, $form_data) }}

            <div class="panel panel-default">

                <div class="panel-heading">

                    <h3 class="panel-title">Precios</h3>

                </div>

                <div class="panel-body">

                    <div class="form-group">

                        {{ Form::label('precio', 'Precio *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-usd"> </span>

                            {{ Form::text('precio', null, array('placeholder' => 'Precio', 'class' => 'form-control')) }}

                            @if($errors->has('precio') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('fecha_ini', 'Fecha Inicio *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>

                            {{ Form::text('fecha_ini', null, array('placeholder' => 'Fecha Inicio', 'class' => 'form-control datepicker minDate')) }}

                            @if($errors->has('fecha_ini') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                    <div class="form-group">

                        {{ Form::label('fecha_fin', 'Fecha Fin *', array('class' => 'control-label col-md-4 col-sm-4')) }}

                        <div class="col-md-7 col-sm-7 input-group">

                            <span class="input-group-addon glyphicon glyphicon-calendar"> </span>

                            {{ Form::text('fecha_fin', null, array('placeholder' => 'Fecha Fin', 'class' => 'form-control datepicker maxDate')) }}

                            @if($errors->has('fecha_fin') )

                                <span class="input-group-addon glyphicon glyphicon-remove alert-danger"> </span>

                            @endif

                        </div>

                    </div>

                </div>

                <div class="panel-footer">

                    {{ Form::submit('Guardar', array('class' => 'btn btn-default')) }}

                </div>

            </div>

        {{ Form::close() }}

    </div>

    <div class="col-md-6 col-sm-6 form-horizontal">

        <div class="panel panel-default">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-md-12 col-sm-12 hidden-lg">

                        {{ Form::open(array('url' => '/buscar/buscar', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search')) }}

                            <div class="form-group input-group">

                                <span class="input-group-addon glyphicon glyphicon-search"> </span>

                                {{ Form::text('buscar', null, array('id' => 'buscar', 'placeholder' => 'Buscar', 'class' => 'form-control')) }}

                                {{ Form::hidden('tabla', 'Precio', array('id' => 'tabla')) }}

                            </div>

                            <div class="btn-group">

                                {{ Form::button('Buscar', array('type' => 'submit', 'class' => 'btn btn-default')) }}

                            </div>

                        {{ Form::close() }}

                    </div>

                </div>

            </div>

            <div class="panel-body">

                <div class="table-responsive">

                    <table class="table table-striped">

                        <tr class="active">

                            <th>Precio</th>

                            <th>Fecha inicio</th>

                            <th>Fecha fin</th>

                            <th>Acciones</th>

                        </tr>

                        @foreach ($lista as $listas)

                            <tr>

                                <td>${{ $listas->precio }}</td>

                                <td>{{ date('d-m-Y', strtotime($listas->fecha_ini)) }}</td>

                                <td>{{ date('d-m-Y', strtotime($listas->fecha_fin)) }}</td>

                                <td>

                                    <a href="{{ route('precioEditar', $listas->id) }}" data-content="Editar" data-placement="bottom" class="glyphicon glyphicon-edit tool"> </a>

                                    <a href="#" data-id="{{ $listas->id }}" data-form="#form-prc" data-content="Eliminar" data-placement="bottom" class="glyphicon glyphicon-trash tool"> </a>

                                </td>

                            </tr>

                        @endforeach

                    </table>

                </div>

            </div>

            <div class="panel-footer">

                {{ $lista->links() }}

                {{ Form::open(array('route' => array('precioBorrar','TERM_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-prc')) }}

                {{ Form::close() }}

            </div>

        </div>

    </div>

</div>

<br/>

<div class="row">

    <div class="col-md-offset-10 col-md-2">

        <a href="{{ route('modeloLista') }}" class="btn btn-danger">Finalizar</a>

    </div>

</div>

@stop