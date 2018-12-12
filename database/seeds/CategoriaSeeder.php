<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categoria')->insert(['descricao' => 'ANIMAL']);
         DB::table('categoria')->insert(['descricao' => 'REMEDIO']);
         DB::table('categoria')->insert(['descricao' => 'INFORMATICA']);
         DB::table('categoria')->insert(['descricao' => 'ESCRITORIO']);
    }
}
