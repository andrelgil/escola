<?php

use App\Models\TwoMonth;
use Illuminate\Database\Seeder;

class TwoMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $twomonths = ['1º Bimestre','2º Bimestre','3º Bimestre','4º Bimestre'];
        foreach ($twomonths as $twomonth){
            factory(TwoMonth::class)->create([
                'name' => $twomonth
            ]);
        }
    }
}
