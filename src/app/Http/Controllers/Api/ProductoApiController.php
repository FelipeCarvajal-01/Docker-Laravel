<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the producto.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json(
            [
                'data' => $productos,
                'status' => 'success',
            ],
            200
        );
    }

    /**
     * Store a newly created producto in storage.
     */
    public function store(ProductoRequest $request)
    {
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        return response()->json(
            [
                'data' => $producto,
                'status' => 'success',
            ],
            200
        );
    }

    /**
     * Display the specified producto.
     */
    public function show(string $id)
    {
        $producto = Producto::where('id', $id)->first();
        return response()->json([
            'data' => $producto,
            'status' => 'success',
        ],200);
}

    /**
     * Update the specified producto in storage.
     */
    public function update(Request $request, string $id)
    {
        $producto = Producto::where('id', $id)->update($request->all());

        return response()->json([
                'data' => $producto,
                'status' => 'success',
            ],200);
    }

    /**
     * Remove the specified producto from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::where('id', $id)->delete();

        return response()->json([
                'data' => $producto,
                'status' => 'success',
            ],200);
    }
}
