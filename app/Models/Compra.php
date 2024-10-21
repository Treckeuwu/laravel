<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'table_compras';  
    protected $fillable = [
        'id_proveedor',
        'fecha_compra',
        'total',
        
    ];
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }}
