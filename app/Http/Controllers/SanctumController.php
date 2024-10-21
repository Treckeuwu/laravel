<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;


class SanctumController extends Controller
{
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'correo' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([

                'message' => $validator->errors()


            ], 422);
        }

        $user = Usuario::where('correo', $request->correo)->first();

        if(!$user || ! Hash::check($request->password, $user->password))
        {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }
        return response()->json([
            'message' => 'Todo bien tenga su token',
            'token' =>  $user->createToken('generic')->plainTextToken
        ], 201);

    }
}
