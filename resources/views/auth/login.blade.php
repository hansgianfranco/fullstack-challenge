<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Panel de Administración</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css" />

</head>

<body>
<div class="app app-header-fixed ">

    <div class="container w-xxl w-auto-xs">
        <a href class="navbar-brand block m-t">Iniciar sesion</a>
        <div class="m-b-lg">
            <div class="wrapper text-center">
                <strong>Ingrese el usuario y contraseña</strong>
            </div>
            <form name="form" class="form-validation" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="list-group list-group-sm">
                    <div class="list-group-item{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" placeholder="Usuario" class="form-control no-border" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="list-group-item{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control no-border" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
