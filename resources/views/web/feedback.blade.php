@extends('web.layouts.app')

@section('content')
    <div class="container" id="feedback">
        <div class="m-t-xxl text-center wrapper">
            <h2 class="text-black font-bold">Evaluación de desempeño</h2>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Datos del participante
            </div>
            <div class="panel-body">
                <div class="m-b mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nombre:</strong> {{ $employee->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $employee->user->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Inicio laboral:</strong> {{ $employee->since }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Genero:</strong> {{ $employee->gender->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Puesto:</strong> {{ $employee->position }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Area:</strong> {{ $employee->division->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-b-xl">
            <p><strong>Completar el Formulario de la pantalla con los datos que a continuación se detallan:</strong></p>
        </div>
        <feedback-form employee="{{ $employee->id }}"></feedback-form>
    </div>
@endsection
