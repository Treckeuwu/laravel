<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'table_roles';
    protected $fillable = [
        'nombre',
        'descripcion',
        
    ];
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}
