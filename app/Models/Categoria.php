<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'table_categorias';
    protected $fillable = [
        'nombre',        
        'descripcion',
    ];
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }}
