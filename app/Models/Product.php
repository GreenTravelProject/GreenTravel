<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Obtener carritos en los que está el producto
    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withTimestamps();
    }
    // Obtener lista de favorito en las que se encuentra el producto
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class)->withTimestamps();
    }

    // Obtener categorías en las que se encuentra el producto
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    // Obtener los pedidos en los que se encuentra el producto
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class)->withTimestamps();
    }

    //TODO: para COMPRAR. Actualizamos el stock. Le pasamos por parámetro true: para aumentar. False para reducir. 
    public function actualizar_stock($type)
    {
        if ($type) {
            $this->stock++;
        } else {
            $this->stock--;
        }
        $this->save();
    }
}