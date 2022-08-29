<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoryScore;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $history = [
            [
                'level' => 'level 01 : f & j',
                'time' => '15',
                'mistake' => '74',
                'wpm' => '56',
                'cpm' => '36',
                'exercise_id' => '1',
                'user_id' => '3',
            ],
            [
                'level' => 'level 01 : f & j',
                'time' => '45',
                'mistake' => '23',
                'wpm' => '76',
                'cpm' => '89',
                'exercise_id' => '1',
                'user_id' => '3',
            ],
        ];

        foreach($history as $key => $value) {
            HistoryScore::create($value);
        }
    }
}
