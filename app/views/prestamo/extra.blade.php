@extends('prestamo/pasos')
@section('content_form')
<br/>
<br/>
{{ Form::model($prestamo, $form_data) }}
@foreach ($extra as $extras)
    <div class="row" style="border-bottom: 1px inset #DDDDDD">
        <div class="col-md-3 col-sm-3">
            @if(!empty($extras->ruta_imagen))
                <img class="img-responsive" src="{{ asset('assets/img/'.$extras->ruta_imagen) }}" alt="foto del accesorio"/>
            @endif
        </div>
        <div class="col-md-3 col-sm-3 text-justify">
            {{ Form::label($extras->extra) }}
        </div>
        <div class="col-md-3 col-sm-3 text-justify">
            {{ Form::label($extras->descripcion) }}
        </div>
        <div class="col-md-2 col-sm-2 text-justify">
            <span class="glyphicon glyphicon-usd"> </span> {{$extras->precio }}
        </div>
        <div class="col-md-1 col-sm-1 text-justify">
            <?php $bd = false; ?>
            @foreach ($prestamo->extras as $key => $pivote)
                @if($extras->id == $pivote->pivot->extra_id)
                    @if($extras->obligatorio == 1 || $extras->cobro == 1)
                        <a href="#" title="" class="close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    @else
                        <a href="{{ route('quitarExtra', array($pivote->pivot->prestamo_id,$pivote->pivot->extra_id)) }}" title="" class="close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    @endif
                    <?php $bd = true; ?>
                @endif
            @endforeach
            @if(!$bd)
                @if($extras->obligatorio == 1 || $extras->cobro == 1)
                    <input type="checkbox" class="styled" name="checkbox_extras[]" value="{{ $extras->id }}" checked style='position: relative; z-index: -10; opacity: .5'/>
                @else
                    <input type="checkbox" class="styled" name="checkbox_extras[]" value="{{ $extras->id }}" />
                @endif
            @endif
        </div>
    </div>
    <br>
@endforeach
<br/>
<div class="row">
    <div class="col-md-2 col-sm-5">
    </div>
    <div class="col-md-offset-8 col-md-2 col-sm-offset-5 col-sm-2">
        {{ Form::submit('Siguiente', array('class' => 'btn btn-danger')) }}
    </div>
</div>
{{ Form::close() }}
@stop