<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'prices',
        'description',
        'image',
        'size',
        'likes',
        'publicationDate',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_categories');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

}


