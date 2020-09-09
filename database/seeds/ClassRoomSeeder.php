<?php

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = ['6a Série A','6a Série B','7a Série A','7a Série B','8a Série A','8a Série B'];

        foreach ($rooms as $room){
            factory(ClassRoom::class)->create([
                'name' => $room
            ]);
        }
    }
}
