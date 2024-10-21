<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class comprasController extends Controller
{
    public function crear(Request $request)
    {
        $validate = $request->validate([
            'id_proveedor' => 'required|exists:table_proveedores,id',
            'total' => 'required|numeric|min:0',
            'fecha_compra' => 'required|date',
        ]);

        $compra = Compra::create([
            'id_proveedor' => $validate['id_proveedor'],
            'total' => $validate['total'],
            'fecha_compra' => $validate['fecha_compra'],
        ]);

        return response()->json(['message' => 'Compra creada exitosamente', 'data' => $compra], 201);
    }

    public function updateCompra(Request $request)
    {
          $validator = Validator::make($request->all(), [
        'id' => 'required|exists:table_compras,id',
        'id_proveedor' => 'required|exists:table_proveedores,id',
        'total' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
    }

    $compra = Compra::find($request->id);

    if (!$compra) {
        return response()->json(['error' => 'Compra no encontrada'], 404);
    }

    $compra->id_proveedor = $request->id_proveedor;
    $compra->total = $request->total;
    $compra->save();

    return response()->json(['message' => 'Compra actualizada exitosamente']);
      
    }

    public function deleteCompra(Request $request)
    {
          $validator = Validator::make($request->all(), [
        'id' => 'required|exists:table_compras,id',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
    }

    $compra = Compra::find($request->id);

    if (!$compra) {
        return response()->json(['error' => 'Compra no encontrada'], 404);
    }

    $compra->delete();

    return response()->json(['message' => 'Compra eliminada exitosamente']);
    }}
