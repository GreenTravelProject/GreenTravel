<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;


    // Obtener usuario del pedido
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Obtener dirección del producto
    public function adress(){
        return $this->belongsTo(Adress::class);
    }

    // Obtener el carro que pertenece al pedido
    public function shopping_cart(){
        return $this->hasOne(Shopping_cart::class);
    }

}
