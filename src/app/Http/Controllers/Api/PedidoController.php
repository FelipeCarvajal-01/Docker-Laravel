<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $productos = Pedido::all();
        return response()->json(
            [
                'data' => $productos,
                'status' => 'success',
            ],
            200
        );
    }

    public function store(Request $request)
    {
        $pedido = Pedido::create([
            'usuario_id' => $request->usuario_id,
            'fecha_pedido' => $request->fecha_pedido,
            'estado' => $request->estado,
            'total' => $request->total,
        ]);

        return response()->json(
            [
                'data' => $pedido,
                'status' => 'success',
            ],
            200
        );
    }

    public function show(string $id)
    {
        $pedido = Pedido::where('id', $id)->first();
        return response()->json([
            'data' => $pedido,
            'status' => 'success',
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::where('id', $id)->update($request->all());

        return response()->json([
            'data' => $pedido,
            'status' => 'success',
        ], 200);
    }

    public function destroy(string $id)
    {
        $pedido = Pedido::where('id', $id)->delete();

        return response()->json([
            'data' => $pedido,
            'status' => 'success',
        ], 200);
    }
}
