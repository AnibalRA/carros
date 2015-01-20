<!doctype html>
<html lang="es">
    <head>
        <title>MultiAutos - Renta de Carros en El Salvador</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='{{ url("assets/img/favicon.ico") }}'>
        {{-- Librerias CSS --}}
        @include('index/librerias_css')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- Menu --}}
                    @include('index/menu')
                    <br/>
                    <br/>
                    <br/>
                    <div>
                        {{-- Contenido --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        {{-- Librerias JS --}}
        @include('index/librerias_js')

        @yield('script')
    </body>
</html>