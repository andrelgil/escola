<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClassRoom;
use Faker\Generator as Faker;

//$factory->define(ClassRoom::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        ];
//});

$i = 0;
$rooms = ['6a Série A','6a Série B','7a Série A','7a Série B','8a Série A','8a Série B'];

foreach ($rooms as $room){
   $factory(ClassRoom::class)->create([
       'name' => $room
   ]);
}
