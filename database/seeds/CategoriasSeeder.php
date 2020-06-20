<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Comida Mexicana',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Comida Italiana',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Comida Francesa',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Comida Argentina',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Bebidas',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Cocteles ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Ensaladas ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Postres',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Comida Rapida ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('categorias_recetas')->insert([
            'categoria'=>'Antojitos ',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);

    }
}
