<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function crearProducto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'nullable|exists:table_categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'id_categoria' => $request->id_categoria,
        ]);

        return response()->json(['message' => 'Producto creado exitosamente', 'data' => $producto], 201);
    }

    public function getProductos()
    {
        $productos = Producto::all();
        return response()->json(['data' => $productos], 200);
    }

    public function updateProducto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_productos,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'nullable|exists:table_categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $producto = Producto::find($request->id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();

        return response()->json(['message' => 'Producto actualizado exitosamente', 'data' => $producto], 200);
    }

    public function deleteProducto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_productos,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }

        $producto = Producto::find($request->id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado exitosamente'], 200);
    }
}
