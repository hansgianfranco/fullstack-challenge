<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Reviews</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css" />
</head>

<body>
<div class="app app-header-fixed ">
    @include('admin.partials.header')
    @include('admin.partials.aside')
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            @yield('content')
        </div>
    </div>
    @include('admin.partials.footer')
</div>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
