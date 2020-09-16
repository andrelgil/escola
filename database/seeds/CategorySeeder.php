<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Ensino Fundamental (5º ao 9º ano)','Ensino Médio (1º ao 3º Colegial)','EJA (Educação de Jovens e Adultos)'];
        foreach ($categories as $category){
            factory(Category::class)->create([
                'name' => $category
            ]);
        }
    }
}
