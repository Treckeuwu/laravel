<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Validator;

class ComprasController extends Controller
{
    public function crearCompra(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_proveedor' => 'required|integer|exists:table_proveedores,id',
            'fecha_compra' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $compra = Compra::create([
            'id_proveedor' => $request->id_proveedor,
            'fecha_compra' => $request->fecha_compra,
            'total' => $request->total,
        ]);

        return response()->json(['message' => 'Compra creada exitosamente', 'data' => $compra], 201);
    }

    public function getCompras()
    {
        $compras = Compra::all();
        return response()->json(['data' => $compras], 200);
    }

    public function updateCompra(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_proveedor' => 'required|integer|exists:table_proveedores,id',
            'fecha_compra' => 'required|date',
            'total' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['error' => 'Compra no encontrada'], 404);
        }

        $compra->id_proveedor = $request->id_proveedor;
        $compra->fecha_compra = $request->fecha_compra;
        $compra->total = $request->total;
        $compra->save();

        return response()->json(['message' => 'Compra actualizada exitosamente', 'data' => $compra], 200);
    }

    public function deleteCompra($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            return response()->json(['error' => 'Compra no encontrada'], 404);
        }

        $compra->delete();

        return response()->json(['message' => 'Compra eliminada exitosamente'], 200);
    }
}
