<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reserva de Hoteles.</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body >
        <div id="app" class="container">
            <router-view />
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
