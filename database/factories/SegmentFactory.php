<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Segment;
use Faker\Generator as Faker;

$factory->define(Segment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        ];
});
