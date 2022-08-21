<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $exercise = [
            [
                'level' => '01',
                'level_name' => 'f & j',
                'data_level' => 'f j',
            ],
            [
                'level' => '02',
                'level_name' => 'd & k',
                'data_level' => 'd k',
            ],
            [
                'level' => '03',
                'level_name' => 's & l',
                'data_level' => 's l',
            ],
            [
                'level' => '04',
                'level_name' => 'a & ;',
                'data_level' => 'a ;',
            ],
            [
                'level' => '05',
                'level_name' => 'g & h',
                'data_level' => 'g h',
            ],
        ];

        foreach($exercise as $key => $value) {
            Exercise::create($value);
        }
    }
}
