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

    public function buscar(){
        return view('estudiante.buscar');
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
    
    
    
    
    public function show(Request $request)
    {
        $cedula = $request->input('cedula');
        $response = Http::get('http://localhost/Quinto/repasos/api.php' . '?cedula=' . $cedula);
    
        $estudiante = $response->json();
    
        
return view('estudiante.buscar', ['estudiantes' => $estudiante]);

    }
    
    
    

    //mostrar formulario para editar
    public function edit(string $id)
    {
        //
    }

    //la diferencia con edit es que este metodo actualiza los datos y en cambio edit solo muestra el formulario
    public function update(Request $request, $cedula)
    {
        $data = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono
        ];
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->put('http://localhost/Quinto/Tarea/controllers/apiRest.php?cedula=' . $cedula, $data);
    
        if ($response->successful()) {
            return redirect('/estudiantes');
        } else {
            
        }
    }


    //eliminar datos
    public function destroy(string $id)
    {
        $response = Http::delete(static::$url. "?cedula=".$id);
        return redirect('/estudiantes');
        
    }
}
