<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Obtener el usuario propietario del carrito
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Obtener productos del carrito
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('amount', 'status');
    }

    // Obtener los pedidos del carro
    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }
}