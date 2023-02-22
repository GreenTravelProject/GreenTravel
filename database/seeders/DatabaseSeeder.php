<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Deportes', 'Camping', 'Extranjero', 'Acuático', 'Animales'];
        $description = [
            'Actividades deportivas para activar el cuerpo y darlo todo',
            'Disfruta de la naturaleza de la forma más natural posible. Convive con más personas',
            'Aunque estés en otro país aún puedes seguir contando con nosotros',
            'Realiza actividades dentro del agua. Te resultará refrescante',
            'Observa y trata con los animales. No tengas miedo, ellos no te temen a tí'
        ];

        $img = ['deportes.jpg', 'camping.jpg', 'extranjero.jpg', 'acuático.jpg', 'animales.jpg'];

        for ($i = 0; $i < count($name); $i++) {
            DB::table('categories')->insert([
                'name' => $name[$i],
                'description' => $description[$i],
                'img' => $img[$i]
            ]);
        }

    }
}