<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TwoMonth;
use Faker\Generator as Faker;

$factory->define(TwoMonth::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
