<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    // Obtener el usuario propietario de la lista favoritos
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // Obtener productos del carrito
    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
