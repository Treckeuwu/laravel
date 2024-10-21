<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function guardar(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $categoria = Categoria::create($validate);

        return response()->json(['message' => 'Categoría creada exitosamente', 'data' => $categoria], 201);
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $categoria = Categoria::findOrFail($validate['id']);
        $categoria->update($validate);

        return response()->json(['message' => 'Categoría actualizada']);
    }

    public function delete(Request $request)
    {
        $validate = $request->validate(['id' => 'required']);
        $categoria = Categoria::findOrFail($validate['id']);
        $categoria->delete();

        return response()->json(['message' => 'Categoría eliminada ']);
    }
}
