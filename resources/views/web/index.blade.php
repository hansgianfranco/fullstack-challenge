@extends('web.layouts.app')

@section('content')
    <div class="container" id="employee">
        <div class="m-t-xxl m-b-xl text-center wrapper">
            <h2 class="text-black font-bold">Lista de evaluaciones pendientes</h2>
        </div>
        <employee-list ></employee-list>
    </div>
@endsection
