<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'table_usuarios';
    protected $fillable = [
        'nombre',
        'correo',
        'password',
        'id_rol',
    ];
    public function rol()
    {
    
        return $this->belongsTo(Rol::class, 'id_rol');
        
    }}
