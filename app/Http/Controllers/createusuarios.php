<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class createusuarios extends Controller
{
    public function guardar(Request $request)
    {
        $validate= $request ->validate([
            'nombre'=> 'required| max:60',
            'correo'=> 'max:60',
            'password' => 'required|string|min:8',
            'id_rol' => 'required|integer|exists:table_roles,id'
            
        ]);

        $usuario = Usuario::create([
            'nombre'=> $validate['nombre'],
            'correo'=> $validate['correo'],
            'password' =>Hash::make($validate['password']),
            'id_rol' => $validate['id_rol'],
            



        ]);
        return response()->json(['message' => 'Usuario creado exitosamente', 'data' => $usuario], 201);
    }


    public function updatepersona(Request $request)
    {
        
        $validate = $request->validate([
            'id' =>  'required',
            'nombre' => 'required|max:60',
            'correo' => 'max:60',
            'id_rol' => 'required|integer|exists:table_roles,id',

        ]);
    
        $id = $validate['id'];
        $persona = Usuario::findOrFail($id);
        
        $persona->nombre = $request->nombre;
        $persona->correo = $request->correo;
        $persona->id_rol = $request->id_rol;

            $persona->save();
    
        return response()->json([
            'message' => 'Persona actualizada correctamente'
        ]);

    }
    public function deletePersona(Request $request)
    {
        $validate = $request->validate([
            'id' =>  'required',
          

        ]);
    
        $id = $validate['id'];
        $persona = Usuario::findOrFail($id);
    
        $persona->delete();
    
        return response()->json([
            'message' => 'Persona eliminada correctamente'
        ]);
    }
    public function getUsuarios()
    {
        $usuarios = Usuario::all();
        return response()->json(['data' => $usuarios], 200);
    }

}
