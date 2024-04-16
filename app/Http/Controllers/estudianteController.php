<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class estudianteController extends Controller
{
    protected static $url = "http://localhost/Quinto/Tarea/controllers/apiRest.php";
    public function index()
    {
        $estudiantes = Http::get(static::$url);
        $estudiantesArray = $estudiantes->json();
        return view('estudiante.mostrar', compact('estudiantesArray'));
    }


    //mostrar formulario
    public function create()
    {
        return view('estudiante.crear');
    }

    //guardar datos
    public function store(Request $request)
    {
        $response = Http::asForm()->post(static::$url, [
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        return redirect('/estudiantes');
    }

    //la diferencia con el metodo index es que este metodo solo muestra un solo dato
    public function show(string $id)
    {
        //
    }

    //mostrar formulario para editar
    public function edit(string $id)
    {
        //
    }

    //la diferencia con edit es que este metodo actualiza los datos y en cambio edit solo muestra el formulario
    public function update(Request $request, string $id)
    {
        //
    }


    //eliminar datos
    public function destroy(string $id)
    {
        $response = Http::delete(static::$url. "?cedula=".$id);
        return redirect('/estudiante');

        
    }
}
