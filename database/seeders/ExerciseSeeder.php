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
            [
                'level' => '06',
                'level_name' => 'y & u',
                'data_level' => 'y u',
            ],
            [
                'level' => '07',
                'level_name' => 't & i',
                'data_level' => 't i',
            ],
            [
                'level' => '08',
                'level_name' => 'r & o',
                'data_level' => 'r o',
            ],
            [
                'level' => '09',
                'level_name' => 'e & p',
                'data_level' => 'e p',
            ],
            [
                'level' => '10',
                'level_name' => 'w & [',
                'data_level' => 'w [',
            ],
            [
                'level' => '11',
                'level_name' => 'q & ]',
                'data_level' => 'q ]',
            ],
            [
                'level' => '12',
                'level_name' => 'mix 02',
                'data_level' => 'q w e r t y u i o p [ ]',
            ],
            [
                'level' => '13',
                'level_name' => 'mix 03',
                'data_level' => 'z x c v b n m , . /',
            ],
        ];

        foreach($exercise as $key => $value) {
            Exercise::create($value);
        }
    }
}
