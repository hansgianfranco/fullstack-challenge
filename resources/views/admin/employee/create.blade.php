@extends('admin.layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Agregar empleados</h1>
    </div>
    <div class="wrapper-md">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="{{ route('employee.store') }}">
                    @csrf
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label>Usuario</label>
                        <input name="username" type="text" class="form-control" value="{{ old('username') }}">
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Contraseña</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Nombre completo</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label>Genero</label>
                        <select name="gender" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach($genders as $key => $value)
                                <option value="{{ $value->id }}" {{ old('gender') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('since') ? ' has-error' : '' }}">
                        <label>Fecha de ingreso laboral</label>
                        <input name="since" type="date" class="form-control" value="{{ old('since') }}">
                    </div>
                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                        <label>Nombre del puesto</label>
                        <input name="position" type="text" class="form-control" value="{{ old('position') }}">
                    </div>
                    <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                        <label>Area de trabajo</label>
                        <select name="division" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach($divisions as $key => $value)
                                <option value="{{ $value->id }}" {{ old('division') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
