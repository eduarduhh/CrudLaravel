<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('produto')->insert([
         						'descricao' 		=> 'CACHORRO',
         						'codigo_categoria'	 => '1',
         						'quantidade' => '10'
         					]);
         DB::table('produto')->insert([
         						'descricao' 		=> 'OMEGGA 3',
         						'codigo_categoria'	 => '2',
         						'quantidade' => '100'
         					]);
         DB::table('produto')->insert([
         						'descricao' 		=> 'NOTEBOOK',
         						'codigo_categoria'	 => '3',
         						'quantidade' => '4'
         					]);
          DB::table('produto')->insert([
         						'descricao' 		=> 'FOLHA SUFITE A4',
         						'codigo_categoria'	 => '4',
         						'quantidade' => '4000'
         					]);

    }
}
