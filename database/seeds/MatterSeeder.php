<?php

use App\Models\Matter;
use Illuminate\Database\Seeder;

class MatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matters = ['Arte','Ciências','Educação Física','Eletiva','Geografia','História','Português','Projeto de Vida','Matemática','Tecnologia'];
        foreach ($matters as $matter){
            factory(Matter::class)->create([
                'name' => $matter
            ]);
        }
    }
}
