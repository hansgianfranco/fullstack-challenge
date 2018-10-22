@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Editar revision</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('review.update', $review->id) }}">
                    @csrf
                    @method("PATCH")
                    <div class="form-group{{ $errors->has('review_date') ? ' has-error' : '' }}">
                        <label>Fecha de revision</label>
                        <p class="form-control disabled">{{ $review->review_date }}</p>
                    </div>
                    <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        <label>Empleado</label>
                        <p class="form-control disabled">{{ $review->employee->name }}</p>
                    </div>
                    <div class="form-group{{ $errors->has('review_date') ? ' has-error' : '' }}">
                        <label>Fecha de revision</label>
                        <input name="review_date" type="date" class="form-control" value="{{ $review->review_date }}">
                    </div>
                    <div class="form-group{{ $errors->has('productivity') ? ' has-error' : '' }}">
                        <label>Productividad</label>
                        <input name="productivity" type="number" class="form-control" placeholder="1 - 5" value="{{ $review->productivity }}">
                    </div>
                    <div class="form-group{{ $errors->has('knowledge') ? ' has-error' : '' }}">
                        <label>Conocimiento del puesto</label>
                        <input name="knowledge" type="number" class="form-control" placeholder="1 - 5" value="{{ $review->knowledge }}">
                    </div>
                    <div class="form-group{{ $errors->has('relationship') ? ' has-error' : '' }}">
                        <label>Relación y cooperación</label>
                        <input name="relationship" type="number" class="form-control" placeholder="1 - 5" value="{{ $review->relationship }}">
                    </div>
                    <div class="form-group{{ $errors->has('initiative') ? ' has-error' : '' }}">
                        <label>Iniciativa y creatividad</label>
                        <input name="initiative" type="number" class="form-control" placeholder="1 - 5" value="{{ $review->initiative }}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
