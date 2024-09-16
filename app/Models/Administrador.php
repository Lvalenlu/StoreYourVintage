<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected  $table = 'administradores'; 

    // Define los campos fillable y demás
    protected $fillable = [
        'nombre',
        'cedula',
        'email',
        'contrasena',
        'cargo',
        'gestor'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}
