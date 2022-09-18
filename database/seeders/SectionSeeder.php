<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $section = [
            [
                'section_sub' => '517102',
                'section_name' => 'Compro 1',
                'code_inclass' => 'JfsiLe',
                'deadline_date' => '2021-25-10',
                'deadline_time' => '12:00',
                'user_id' => '2',
            ],
            [
                'section_sub' => '520439',
                'section_name' => 'Project 1',
                'code_inclass' => 'kfoDPa',
                'deadline_date' => '2022-30-12',
                'deadline_time' => '12:00',
                'user_id' => '2',
            ],
            [
                'section_sub' => '520439',
                'section_name' => 'Project 2',
                'code_inclass' => 'kfdSPD',
                'deadline_date' => '2022-30-12',
                'deadline_time' => '12:00',
                'user_id' => '2',
            ],
            [
                'section_sub' => '520439',
                'section_name' => 'Project 3',
                'code_inclass' => 'AowoPW',
                'deadline_date' => '2022-30-12',
                'deadline_time' => '12:00',
                'user_id' => '2',
            ],
        ];

        foreach($section as $key => $value) {
            Section::create($value);
        }
    }
}
