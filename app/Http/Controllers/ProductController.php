<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function crear_producto()
    {
        $categories = Category::all();
        return view('admin.products.create', @compact('categories'));
    }
    public function mostrar_productos()
    {
        $productos = Product::paginate(10);
        return view('admin.products.adminProducts', @compact('productos'));
    }
    public function insertar_producto(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'description' => 'required|string|min:3',
            'price' => 'required|decimal:2,4',
            'date' => 'required|date_format:Y-m-d',
            'state' => 'boolean',
            'stock' => 'required|integer',
            'img' => 'required|regex:/(\d)+.(?:jpe?g)/|min:3|max:255',
            'category' => 'required'
        ]);

        $crearProducto = new Product;

        $crearProducto->name = $request->name;
        $crearProducto->description = $request->description;
        $crearProducto->price = $request->price;
        $crearProducto->date = $request->date;
        $crearProducto->state = $request->state;
        if ($request->state == null) {
            $crearProducto->state = 0;
        } else {
            $crearProducto->state = 1;
        }
        $crearProducto->stock = $request->stock;
        $crearProducto->img = $request->img;
        $crearProducto->save();
        //Si se selecciona 1 categoría, se añade directamente. Si no, se va insertando una por una con un for:
        if (count($request->category) == 1) {
            $crearProducto->categories()->attach($request->category);

        } else {
            foreach ($request->category as $s) {
                $crearProducto->categories()->attach($s);
            }
        }

        return back()->with('mensaje', 'El producto se ha añadido correctamente');
    }

    public function editar_producto($id)
    {
        $producto = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', @compact('producto', 'categories'));
    }

    public function actualizar_producto(Request $request, $id)
    {
        //TODO: categoría nunca puede estar vacía, peta
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'description' => 'required|string|min:3',
            'price' => 'required|decimal:2,4',
            'date' => 'required|date_format:Y-m-d',
            'state' => 'boolean',
            'stock' => 'required|integer',
            'img' => 'required|regex:/(\d)+.(?:jpe?g)/|min:3|max:255',
            'category' => 'required'
        ], [
                'img.regex' => "No lo dejes vacío"
            ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $producto = Product::findOrFail($id);
            $producto->id = $request->id;
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->price = $request->price;
            $producto->date = $request->date;
            if ($request->state == null) {
                $producto->state = 0;
            } else {
                $producto->state = 1;
            }
            $producto->stock = $request->stock;

            $producto->categories()->detach();

            if (isset($request->category)) {
                if (count($request->category) == 1) {
                    $producto->categories()->attach($request->category);

                } else {
                    foreach ($request->category as $s) {
                        $producto->categories()->attach($s);
                    }
                }
            }
            $producto->save();

            $imgName = "product" . $producto->id . ".jpg";
            $request->img->move(public_path('img/products'), $imgName);
            $producto->img = $imgName;

            $producto->save();

            return back()->with('mensaje', 'El producto ha sido modificado' . $request);
        } else {
            return back()->with('errors');

        }
    }


    public function eliminar_producto($id)
    {
        $producto = Product::findOrFail($id);
        $producto->categories()->detach(); //se le quita la relación con las categorías para evitar que falle la FK

        //TODO: HAY QUE COMPROBAR QUE EL PRODUCTO NO ESTÁ EN NINGÚN PEDIDO
        // $productoPedido; 

        // if (isset($productoPedido)) {
        //     $producto->state = 1;
        //     $producto->save();
        //     return back()->with('error', 'Hay pedidos con ese producto. Se marcará como deshabilitado');
        // } else {
        //     $producto->delete();
        //     return back()->with('mensaje', 'El producto ha sido eliminado.');
        // }
    }

}