<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;


    // Obtener usuario del pedido
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Obtener productos
    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('amount');
    }

    // Obtener el carro al que pertenece el pedido
    public function shopping_cart()
    {
        return $this->belongsTo(Shopping_cart::class);
    }

// Obtener dirección del producto
// public function adress(){
//     return $this->belongsTo(Adress::class);
// }

}