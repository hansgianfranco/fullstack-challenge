<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluacion de desempeño</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css" />
</head>

<body style="background-color: #fff;">
<div class="app ">
    @include('web.partials.header')
    <div id="content">
        <div class="bg-white-only">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
