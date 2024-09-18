<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;


    protected $table = 'products';

    protected $fillable = [
        'name',
        'lastName',
        'document',
        'address',
        'email',
        'password',
        'role   '
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
