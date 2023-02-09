<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //TODO:Pasar por parámetro la paginación: 
    public function mostrar_productos()
    {
        $productos = Product::all();
        $productos = Product::paginate(10);
        return view('admin', @compact('productos'));
    }
    public function crear_producto(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'description' => 'required|alpha|min:3',
            'price' => 'required|decimal:2,4',
            'date' => 'required|date_format:Y/m/d',
            'state' => 'required|boolean',
            'stock' => 'required|integer',
            'img' => 'required|min:3|max:255'
        ]);

        $crearProducto = new Product;

        $crearProducto->name = $request->name;
        $crearProducto->description = $request->description;
        $crearProducto->price = $request->price;
        $crearProducto->date = $request->date;
        $crearProducto->state = $request->state;
        $crearProducto->stock = $request->stock;
        $crearProducto->img = $request->img;

        $crearProducto->save();

        return back()->with('mensaje', 'El producto se ha añadido correctamente');
    }

    public function editar_producto($id)
    {
        $producto = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', @compact('producto', 'categories'));
    }

    public function actualizar_producto(Request $request, $id)
    {
        //ESTO NO FUNCIONA
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            // 'description' => 'required|alpha|min:3',
            // 'price' => 'required|integer',
            // 'date' => 'required|date_format:Y/m/d',
            // 'state' => 'required|boolean',
            // 'stock' => 'required|integer',
            // 'img' => 'required|min:3|max:255',
            // 'category' => 'required|integer'
        ]);

        $producto = Product::findOrFail($id);
        $producto->id = 1;
        $producto->name = $request->name;
        // $producto->description = $request->description;
        // $producto->price = $request->price;
        // $producto->date = $request->date;
        // $producto->state = $request->state;
        // $producto->stock = $request->stock;
        // $producto->img = $request->img;
        $producto->save();
        DB::table('category_product')->insert([
            ['category_id' => 1],
            ['product_id' => 1],
        ]);
        return back()->with('mensaje', 'El producto ha sido modificado');
    }

    public function eliminar_producto($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return back()->with('mensaje', 'El usuario ha sido eliminado.');
    }

}