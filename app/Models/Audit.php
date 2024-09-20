<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'reason',
        'type',
        'id_users'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
