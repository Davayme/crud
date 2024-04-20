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


                    <td>
                        <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$estudiante['cedula']}}">
                            Editar
                        </button>
            
                        <div class="modal fade" id="editModal{{$estudiante['cedula']}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Estudiante</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('estudiantes.update', ['cedula' => $estudiante['cedula']]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="cedula">Cedula</label>
                                                <input type="text" class="form-control" id="cedula" name="cedula" value="{{$estudiante['cedula']}}" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$estudiante['nombre']}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="apellido">Apellido</label>
                                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{$estudiante['apellido']}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion">Direccion</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{$estudiante['direccion']}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Telefono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{$estudiante['telefono']}}" required>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>

<a href="{{url('estudiantes/create')}}">Crear estudiante</a>
@endsection
   