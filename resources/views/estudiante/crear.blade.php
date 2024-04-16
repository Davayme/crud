@extends('estudiante/template')
@section('title', 'Agregar estudiante')
@section('content')
    <h1>Agregar estudiante</h1>
    <form action="{{url('/estudiantes')}}" method="POST">
        @csrf
        <label for="cedula">Cedula</label>
        <input type="text" name="cedula" id="cedula">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido">
        <br>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion">
        <br>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono">
        <br>
        <button type="submit">Guardar</button>
    </form>
@endsection
