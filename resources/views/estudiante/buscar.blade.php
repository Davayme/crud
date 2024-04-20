@extends('estudiante/template')

@section('title', 'Buscar Estudiante')

@section('content')
<h2>Buscar Estudiante</h2>

<!-- Formulario para buscar estudiante -->
<form method="GET" action="{{ route('estudiantes.buscar') }}">
    <div class="form-group">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<!-- Tabla para mostrar los datos del estudiante -->
<table class="table">
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <!-- Agrega aquí más columnas según los datos que quieras mostrar -->
        </tr>
    </thead>
    <tbody>
        @if(isset($estudiantes))
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{$estudiante['cedula']}}</td>
                    <td>{{ $estudiante['nombre'] }}</td>
                    <td>{{ $estudiante['apellido'] }}</td>
                    <!-- Agrega aquí más celdas según los datos que quieras mostrar -->
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@endsection