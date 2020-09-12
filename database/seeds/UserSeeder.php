<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'     => 'Andre Gil',
            'email'    => 'andrelgil@hotmail.com',
            'password' => Hash::make('12345678'),
            'admin'    => 1,
            'teacher'  => 1
        ]);
    }
}
