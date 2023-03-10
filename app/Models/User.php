<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    // Obtener el carrito de compra asociado al usuario
    public function cart(){
        return $this->hasOne(Cart::class);
    }
    // Obtener lista favoritos asociada al usuario
    public function favorite(){
        return $this->hasOne(Favorite::class);
    }

    // Obtener direcciones del usuario
    public function adress(){
        return $this->hasOne(Adress::class);
    }

    public function delivery(){
        return $this->hasOne(Delivery::class);
    }

    // * --- DEFAULT ---
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'birth_date',
        'phone',
        'email',
        'password',
        'genre',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
