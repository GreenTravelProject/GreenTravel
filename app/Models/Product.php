<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Obtener carritos en los que está el producto
    public function shopping_carts()
    {
        return $this->belongsToMany(Shopping_cart::class)->withTimestamps();
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

    public static function deportes(int $param)
    {
        return Category::where('name', 'deportes')->paginate($param);
    }

    public static function findByCategory(int $categoryId, int $paginate){

        return Product::intersect(Category::whereIn($categoryId))->paginate($paginate);
    }
}