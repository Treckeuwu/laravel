<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Validator;

class DetalleVentaController extends Controller
{
    public function crearDetalleVenta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_venta' => 'required|exists:table_ventas,id',
            'id_producto' => 'required|exists:table_productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $detalleVenta = DetalleVenta::create([
            'id_venta' => $request->id_venta,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'subtotal' => $request->subtotal,
        ]);

        return response()->json(['message' => 'Detalle de venta creado exitosamente', 'data' => $detalleVenta], 201);
    }

    public function getDetalleVentas()
    {
        $detalleVentas = DetalleVenta::all();
        return response()->json(['data' => $detalleVentas], 200);
    }

    public function updateDetalleVenta(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_venta' => 'required|exists:table_ventas,id',
            'id_producto' => 'required|exists:table_productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $detalleVenta = DetalleVenta::find($id);

        if (!$detalleVenta) {
            return response()->json(['error' => 'Detalle de venta no encontrado'], 404);
        }

        $detalleVenta->id_venta = $request->id_venta;
        $detalleVenta->id_producto = $request->id_producto;
        $detalleVenta->cantidad = $request->cantidad;
        $detalleVenta->precio_unitario = $request->precio_unitario;
        $detalleVenta->subtotal = $request->subtotal;
        $detalleVenta->save();

        return response()->json(['message' => 'Detalle de venta actualizado exitosamente', 'data' => $detalleVenta], 200);
    }

    public function deleteDetalleVenta($id)
    {
        $detalleVenta = DetalleVenta::find($id);

        if (!$detalleVenta) {
            return response()->json(['error' => 'Detalle de venta no encontrado'], 404);
        }

        $detalleVenta->delete();

        return response()->json(['message' => 'Detalle de venta eliminado exitosamente'], 200);
    }
}
