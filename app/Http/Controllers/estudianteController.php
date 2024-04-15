<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class estudianteController extends Controller
{
    protected static $url = "http://localhost/Quinto/Tarea/controllers/apiRest.php";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Http::get(static::$url);
        $estudiantesArray = $estudiantes->json();
        return view('estudiante.mostrar', compact('estudiantesArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //mostrar formulario
    public function create()
    {
        return view('estudiantes.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    //guardar datos
    public function store(Request $request)
    {
        $response = Http::assForm()->post(static::$url, [
            'cedula' => $request->input('cedula'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
        ]);

        return redirect('/estudiante');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //eliminar datos
    public function destroy(string $id)
    {
        $response = Http::delete(static::$url. "?cedula=".$id);
        return redirect('/estudiante');

        
    }
}
