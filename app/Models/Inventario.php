<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'table_inventario';
    protected $fillable = [
        'id_producto',
        'cantidad',
        'tipo_movimiento',
        'fecha_movimiento',
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }}
