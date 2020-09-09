<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Material;
use Faker\Generator as Faker;

//$factory->define(Material::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        ];
//});

$i = 0;
$materials = ['Português','Matemática','Geografia','História','Ciências','Ed. Física','Arte','Projeto de Vida','Eletiva','Tecnologia'];

foreach ($materials as $material){
   $factory(Material::class)->create([
       'name' => $material
   ]);
}
