<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Categoria;

use Illuminate\Http\Request;

class categoriascontroller extends Controller
{
    public function getCategorias()
    {
        $categorias = Categoria::all();

        return response()->json(['data' => $categorias], 200);
    }
    public function crearCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }
    
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
           
        ]);
    
        return response()->json(['message' => 'Categoría creada exitosamente', 'data' => $categoria], 201);
    }
    public function updateCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_categorias,id',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }
    
        $categoria = Categoria::find($request->id);
    
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
    
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->precio = $request->precio;
        $categoria->stock = $request->stock;
        $categoria->save();
    
        return response()->json(['message' => 'Categoría actualizada exitosamente']);
    }
    
    public function deleteCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:table_categorias,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => 'Validación fallida', 'details' => $validator->errors()], 422);
        }
    
        $categoria = Categoria::find($request->id);
    
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
    
        $categoria->delete();
    
        return response()->json(['message' => 'Categoría eliminada exitosamente']);
    }
    












    }
