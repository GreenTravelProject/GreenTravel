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

    // Obtener productos del carrito
    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    // Obtener el pedido del carrito
    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }
}
