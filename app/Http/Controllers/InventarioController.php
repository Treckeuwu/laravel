<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Support\Facades\Validator;

class InventarioController extends Controller
{
    public function insertarinventario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_producto' => 'required|exists:table_productos,id',
            'cantidad' => 'required|integer|min:1',
            'tipo_movimiento' => 'required|in:entrada,salida',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $movimiento = Inventario::create([
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'tipo_movimiento' => $request->tipo_movimiento,
            'fecha_movimiento' => now(),
        ]);

        return response()->json(['message' => 'Movimiento de inventario registrado exitosamente', 'data' => $movimiento], 201);
    }

    public function getinventario()
    {
        $movimientos = Inventario::all();
        return response()->json(['data' => $movimientos], 200);
    }

    public function updateinventario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_inventario,id',
            'id_producto' => 'required|exists:table_productos,id',
            'cantidad' => 'required|integer|min:1',
            'tipo_movimiento' => 'required|in:entrada,salida',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $movimiento = Inventario::find($request->id);

        if (!$movimiento) {
            return response()->json(['error' => 'Movimiento de inventario no encontrado'], 404);
        }

        $movimiento->id_producto = $request->id_producto;
        $movimiento->cantidad = $request->cantidad;
        $movimiento->tipo_movimiento = $request->tipo_movimiento;
        $movimiento->save();

        return response()->json(['message' => 'Movimiento de inventario actualizado exitosamente', 'data' => $movimiento], 200);
    }

    public function deleteinventario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_inventario,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $movimiento = Inventario::find($request->id);

        if (!$movimiento) {
            return response()->json(['error' => 'Movimiento de inventario no encontrado'], 404);
        }

        $movimiento->delete();

        return response()->json(['message' => 'Movimiento de inventario eliminado exitosamente'], 200);
    }
}
