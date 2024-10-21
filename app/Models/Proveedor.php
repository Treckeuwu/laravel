<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'table_proveedores';

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_proveedor');
    }}
