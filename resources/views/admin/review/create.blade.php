@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Agregar revision</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('review.store') }}">
                    @csrf
                    <div class="form-group{{ $errors->has('review_date') ? ' has-error' : '' }}">
                        <label>Fecha de revision</label>
                        <input name="review_date" type="date" class="form-control" value="{{ old('review_date') }}">
                    </div>
                    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        <label>Empleado</label>
                        <select name="employee_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach($employees as $key => $value)
                                <option value="{{ $value->id }}" {{ old('employee_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('productivity') ? ' has-error' : '' }}">
                        <label>Productividad</label>
                        <input name="productivity" type="number" class="form-control" placeholder="1 - 5" value="{{ old('productivity') }}">
                    </div>
                    <div class="form-group{{ $errors->has('knowledge') ? ' has-error' : '' }}">
                        <label>Conocimiento del puesto</label>
                        <input name="knowledge" type="number" class="form-control" placeholder="1 - 5" value="{{ old('knowledge') }}">
                    </div>
                    <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
                        <label>Relación y cooperación</label>
                        <input name="relationship" type="number" class="form-control" placeholder="1 - 5" value="{{ old('relationship') }}">
                    </div>
                    <div class="form-group{{ $errors->has('initiative') ? ' has-error' : '' }}">
                        <label>Iniciativa y creatividad</label>
                        <input name="initiative" type="number" class="form-control" placeholder="1 - 5" value="{{ old('initiative') }}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
