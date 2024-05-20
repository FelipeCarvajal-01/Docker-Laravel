<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas = Tarea::all();

        return response()->json([
                'data' => $tareas,
                'status' => 'success',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tareas = Tarea::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'fecha_vencimiento' => $request->fecha_vencimiento,
        ]);

        return response()->json([
            'data' => $tareas,
            'status' => 'success',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tareas = Tarea::where('id', $id)->first();

        return response()->json([
            'data' => $tareas,
            'status' => 'success',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tareas = Tarea::where('id', $id)->update($request -> all());

        return response()->json([
            'data' => $tareas,
            'status' => 'success',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tareas = Tarea::where('id', $id)->delete();

        return response()->json([
            'data' => $tareas,
            'status' => 'success',
        ], 200);
    }
}
