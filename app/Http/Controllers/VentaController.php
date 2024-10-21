<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Validator;

class VentaController extends Controller
{
    public function crearVenta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_cliente' => 'required|exists:table_clientes,id',
            'total' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $venta = Venta::create([
            'id_cliente' => $request->id_cliente,
            'total' => $request->total,
        ]);

        return response()->json(['message' => 'Venta creada exitosamente', 'data' => $venta], 201);
    }

    public function getVentas()
    {
        $ventas = Venta::all();
        return response()->json(['data' => $ventas], 200);
    }

    public function updateVenta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_ventas,id',
            'id_cliente' => 'required|exists:table_clientes,id',
            'total' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $venta = Venta::find($request->id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        $venta->id_cliente = $request->id_cliente;
        $venta->total = $request->total;
        $venta->save();

        return response()->json(['message' => 'Venta actualizada exitosamente', 'data' => $venta], 200);
    }

    public function deleteVenta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_ventas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $venta = Venta::find($request->id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        $venta->delete();

        return response()->json(['message' => 'Venta eliminada exitosamente'], 200);
    }
}
