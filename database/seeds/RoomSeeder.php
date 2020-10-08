<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = ['6º Ano A','6º Ano B','6º Ano C','7º Ano A','7º Ano B','8º Ano A','8º Ano B','8º Ano C'];

        foreach ($rooms as $room){
            factory(Room::class)->create([
                'name' => $room
            ]);
        }
    }
}
