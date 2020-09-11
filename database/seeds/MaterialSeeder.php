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
        $materials = ['Português','Matemática','Geografia','História','Ciências','Educação Física','Arte','Projeto de Vida','Eletiva','Tecnologia'];
        foreach ($materials as $material){
            factory(Material::class)->create([
                'name' => $material
            ]);
        }
    }
}
