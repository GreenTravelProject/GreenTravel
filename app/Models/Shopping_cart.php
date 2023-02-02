<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_cart extends Model
{
    use HasFactory;

    // Obtener el usuario propietario del carrito
    public function user(){
        return $this->belongsTo(User::class);
    }
}
