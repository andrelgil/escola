<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassRoom;
use App\Models\ClassRoom_Material;
use App\Models\Material;
use Faker\Generator as Faker;

$factory->define(ClassRoom_Material::class, function (Faker $faker) {
    return [
        'classroom_id' => ClassRoom::inRandomOrder()->first()->id,
        'material_id'  => Material::inRandomOrder()->first()->id,
    ];
});
