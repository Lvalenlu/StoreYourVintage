<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    public function  colors()
   {
       return $this->belongsTo(Product::class, 'state_id');

   }
}
