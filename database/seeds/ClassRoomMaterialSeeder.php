<?php

use Illuminate\Database\Seeder;

class ClassRoomMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ClassRoom_Material::class,10)->create();
    }
}
