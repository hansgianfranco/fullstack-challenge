@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Detalle de revision</h1>
    </div>
    <div class="wrapper-md">
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
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped b-t b-b">
                    <thead>
                    <tr>
                        <th>Fecha de revisión</th>
                        <th>Rendimiento general</th>
                        <th>Productividad</th>
                        <th>Conocimiento del puesto</th>
                        <th>Relación y cooperación</th>
                        <th>Iniciativa y creatividad</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $review->review_date }}</td>
                            <td>{{ $review->performance }}</td>
                            <td>{{ $review->productivity }}</td>
                            <td>{{ $review->knowledge }}</td>
                            <td>{{ $review->relationship }}</td>
                            <td>{{ $review->initiative }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
