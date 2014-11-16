@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class='text-center'>Boletin</h1>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="active">
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                    </tr>
                    @foreach ($boletin as $boletins)
                        <tr>
                            <td>{{ $boletins->nombre }}</td>
                            <td>{{ $boletins->email }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="panel-footer"></div>
    </div>
@stop