<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    // Obtener usuario al que pertenece la direccion
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Obtener pedidos que pertenencen a la dirección
    // public function deliveries(){
    //     return $this->hasMany(Delivery::class);
    // }
}
