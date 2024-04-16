@extends('estudiante/template')
@section('title', 'Agregar estudiante')
@section('content')
<div class="container">
    <h1 class="mb-4">Agregar estudiante</h1>
    <form action="{{url('/estudiantes')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="text" class="form-control" name="cedula" id="cedula" required>
            <div class="invalid-feedback">
                Por favor ingresa la cedula.
            </div>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
            <div class="invalid-feedback">
                Por favor ingresa el nombre.
            </div>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" required>
            <div class="invalid-feedback">
                Por favor ingresa el apellido.
            </div>
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" required>
            <div class="invalid-feedback">
                Por favor ingresa la direccion.
            </div>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" required>
            <div class="invalid-feedback">
                Por favor ingresa el telefono.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
