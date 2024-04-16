@extends('estudiante/template')
@section('title', 'Mostrar Estudiante')
@section('content')
    <h1>Mostrar Estudiante</h1>
    <table border="1" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($estudiantesArray as $estudiante)
                <tr>
                    <td>{{$estudiante['cedula']}}</td>
                    <td>{{$estudiante['nombre']}}</td>
                    <td>{{$estudiante['apellido']}}</td>
                    <td>{{$estudiante['direccion']}}</td>
                    <td>{{$estudiante['telefono']}}</td>
                    <td>
                        <form action="{{url('estudiantes/'.$estudiante['cedula'])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                    
                </tr>
                
            @endforeach
        </tbody>
    </table>

<a href="{{url('estudiantes/create')}}">Crear estudiante</a>
@endsection
   