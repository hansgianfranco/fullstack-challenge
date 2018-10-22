@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Lista de empleados</h1>
    </div>
    <div class="wrapper-md">
        <div class="m-b mb-4">
            <a href="{{ route('employee.create') }}" class="btn btn-primary">Agregar empleado</a>
        </div>
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped b-t b-b">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Puesto</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $key => $value)
                        <tr>
                            <td>{{ $value->name  }}</td>
                            <td>{{ $value->since  }}</td>
                            <td>{{ $value->position  }}</td>
                            <td>{{ $value->division->name }}</td>
                            <td>
                                <a href="{{ route('employee.show', $value->id) }}" class="btn btn-xs btn-primary"><span class="fa fa-eye"></span></a>
                                <a href="{{ route('employee.edit', $value->id) }}" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span></a>
                                <form action="{{ route('employee.destroy', $value->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-xs btn-danger" type="submit"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $employees->links() }}
        </div>
    </div>
@endsection
