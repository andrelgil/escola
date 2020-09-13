<?php

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = ['Arte','Ciências','Educação Física','Eletiva','Geografia','História','Português','Projeto de Vida','Matemática','Tecnologia'];
        foreach ($materials as $material){
            factory(Material::class)->create([
                'name' => $material
            ]);
        }
    }
}
