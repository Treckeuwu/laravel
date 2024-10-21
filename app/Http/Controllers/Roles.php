<?php

namespace App\Http\Controllers;
use App\Models\Rol;
use Illuminate\Http\Request;

class Roles extends Controller
{
    public function crear(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|max:60',
            'descripcion' => 'required'
        ]);


        $rol = Rol::create([
            'nombre' => $validate['nombre'],
            'descripcion' => $validate['descripcion'],
           
        ]);

        return response()->json(['message' => 'rol creado exitosamente', 'data' => $rol], 201);
    }


    public function updateRol(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'nombre' => 'required|max:60',
            'descripcion' => 'required'

        ]);

        $id = $validate['id'];
        $rol = Rol::findOrFail($id);

        $rol->nombre = $request->nombre;
        $rol->descripcion = $request->descripcion;

        $rol->save();

        return response()->json(['message' => 'Rol actualizado']);
    }
    public function deleteRol(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
        ]);

        $id = $validate['id'];
        $rol = Rol::findOrFail($id);

        $rol->delete();

        return response()->json(['message' => 'Rol eliminado']);
    }

    public function getRols()
    {
        $rols = Rol::all();
        return response()->json(['data' => $rols], 200);
    }
}




