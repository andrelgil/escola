<?php

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $segments = ['Ensino Fundamental (5º ao 9º ano)','Ensino Médio (1º ao 3º Colegial)','EJA (Educação de Jovens e Adultos)'];

        foreach ($segments as $segments){
            factory(Segment::class)->create([
                'name' => $segments
            ]);
        }
    }
}

