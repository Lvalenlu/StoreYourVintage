<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

    public $timestamps = false;

    public function apply($query, $filters)
    {
        if (isset($filters['categories']) && !empty($filters['categories'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->whereIn('categories.id', $filters['categories']);
            });
        }

        if (isset($filters['sizes']) && !empty($filters['sizes'])) {
            $query->whereHas('size', function ($q) use ($filters) {
                $q->whereIn('sizes.id', $filters['sizes']);
            });
        }

        if (isset($filters['colors']) && !empty($filters['colors'])) {
            $query->whereHas('color', function ($q) use ($filters) {
                $q->whereIn('colors.id', $filters['colors']);
            });
        }

        return $query;
    }
}