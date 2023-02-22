<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function category(int $categoryId)
    {
        //Guardamos la categoría seleccionada por ID 
        $category = Category::findOrFail($categoryId);

        //Buscamos los productos de la categoría. Por parámetro le pasamos la categoría y el nº de productos por pantalla(paginar)
        $products = $category->products;

        //Devolvemos a la vista los datos de la categoría seleccionada
        return view('category', @compact("category", "products"));
    }

    public function crear_categoria()
    {
        return view('admin.categories.create');
    }

    public function insertar_categoria(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'description' => 'required|string|min:3',
            'img' => 'required|regex:/(?:jpe?g)/|min:3|max:255',
        ], [
                'img.regex' => "No lo dejes vacío"
            ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->img = $request->img;

            $category->save();
            return back()->with('mensaje', 'La categoría ha sido creada');
        } else {
            return back()->with('errors');

        }
    }

    public function mostrar_categorias()
    {
        $categories = Category::all();
        $categories = Category::paginate(10);

        return view('admin.categories.adminCategories', @compact('categories'));
    }

    public function editar_categoria($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', @compact('category'));
    }

    public function actualizar_categoria(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:255',
            'description' => 'required|string|min:3',
            'img' => 'required|regex:/(?:jpe?g)/|min:3|max:255',
        ], [
                'img.regex' => "No lo dejes vacío"
            ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $category = Category::findOrFail($id);
            $category->id = $request->id;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->img = $request->img;

            $category->save();
            return back()->with('mensaje', 'La categoría ha sido modificada');
        } else {
            return back()->with('errors');
        }
    }

    public function eliminar_categoria($id)
    {
        $category = Category::findOrFail($id);
        $category->products()->detach(); //eliminamos la relación de los productos
        $category->delete();
        return back()->with('mensaje', 'La categoría ha sido eliminada. Recuerda que los productos asociados a la categoría no aparecerán en la web a menos que les asignes una nueva categoría');
    }

}