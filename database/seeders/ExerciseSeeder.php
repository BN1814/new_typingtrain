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
                'data_level' => 'ffff jjjj ffff jjjj fjfj fjfj fjfj fjfj',
            ],
            [
                'level' => '02',
                'level_name' => 'd & k',
                'data_level' => 'dddd kkkk dddd kkkk dkdk dkdk dkdk dkdk',
            ],
            [
                'level' => '03',
                'level_name' => 's & l',
                'data_level' => 'ssss llll ssss llll slsl slsl slsl slsl',
            ],
            [
                'level' => '04',
                'level_name' => 'a & ;',
                'data_level' => 'aaaa ;;;; aaaa ;;;; a;a; a;a; a;a; a;a;',
            ],
            [
                'level' => '05',
                'level_name' => 'g & h',
                'data_level' => 'gggg hhhh gggg hhhh ghgh ghgh ghgh ghgh',
            ],
            [
                'level' => '06',
                'level_name' => 'mix 01',
                'data_level' => 'demand google supervisor computer programming constructure;',
            ],
            [
                'level' => '07',
                'level_name' => 'y & u',
                'data_level' => 'yyyy uuuu yyyy uuuu yuyu yuyu yuyu yuyu',
            ],
            [
                'level' => '08',
                'level_name' => 't & i',
                'data_level' => 'tttt iiii tttt iiii titi titi titi titi',
            ],
            [
                'level' => '09',
                'level_name' => 'r & o',
                'data_level' => 'rrrr oooo rrrr oooo roro roro roro roro',
            ],
            [
                'level' => '10',
                'level_name' => 'e & p',
                'data_level' => 'eeee pppp eeee pppp epep epep epep epep',
            ],
            [
                'level' => '11',
                'level_name' => 'w & [',
                'data_level' => 'wwww [[[[ wwww [[[[ w[w[ w[w[ w[w[ w[w[',
            ],
            [
                'level' => '12',
                'level_name' => 'mix 02',
                'data_level' => 'episode status environment enterprise supercomputer',
            ],
            [
                'level' => '13',
                'level_name' => 'q & ]',
                'data_level' => 'qqqq ]]]] qqqq ]]]] q]q] q]q] q]q] q]q]',
            ],
            [
                'level' => '14',
                'level_name' => 'mix 03',
                'data_level' => 'q w e r t y u i o p [ ]',
            ],
            [
                'level' => '15',
                'level_name' => 'mix 04',
                'data_level' => 'z x c v b n m , . /',
            ],
        ];

        foreach($exercise as $key => $value) {
            Exercise::create($value);
        }
    }
}
