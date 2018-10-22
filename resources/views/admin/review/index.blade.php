@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Lista de revisiones</h1>
    </div>
    <div class="wrapper-md">
        <div class="m-b mb-4">
            <a href="{{ route('review.create') }}" class="btn btn-primary">Agregar revisión</a>
        </div>
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-striped b-t b-b">
                    <thead>
                    <tr>
                        <th>Fecha de revisión</th>
                        <th>Empleado</th>
                        <th>Puesto</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $key => $value)
                        <tr>
                            <td>{{ $value->review_date  }}</td>
                            <td>{{ $value->employee->name  }}</td>
                            <td>
                                <a href="{{ route('review.show', $value->id) }}" class="btn btn-xs btn-primary"><span class="fa fa-eye"></span></a>
                                <a href="{{ route('review.edit', $value->id) }}" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
