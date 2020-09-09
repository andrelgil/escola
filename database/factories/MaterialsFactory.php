<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Material;
use Faker\Generator as Faker;

$factory->define(Material::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
