<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Rol::all(); 

        Usuario::factory(50)->create()->each(function($usuario) use ($roles) {
            $usuario->id_rol = $roles->random()->id;
            $usuario->save();
        });
    }
}
