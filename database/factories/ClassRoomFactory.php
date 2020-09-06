<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassRoom;
use Faker\Generator as Faker;

$factory->define(ClassRoom::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        ];
});
