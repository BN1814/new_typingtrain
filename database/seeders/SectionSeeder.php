<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use Carbon\Carbon;

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
        $date = '30/12/2022';
        $changeDate = Str_replace('/', '-', $date);
        $section = [
            [
                'section_sub' => '517102',
                'section_name' => 'Compro 1',
                'code_inclass' => 'JfsiLe',
                'deadline_date' => date('Y-m-d', strtotime($changeDate)),
                'deadline_time' => '23:59',
                'user_id' => '2',
            ],
            [
                'section_sub' => '520439',
                'section_name' => 'Project 1',
                'code_inclass' => 'kfoDPa',
                'deadline_date' => date('Y-m-d', strtotime($changeDate)),
                'deadline_time' => '23:59',
                'user_id' => '2',
            ],
            // [
            //     'section_sub' => '520439',
            //     'section_name' => 'Project 2',
            //     'code_inclass' => 'kfdSPD',
            //     'deadline_date' => date('2022-30-12'),
            //     'deadline_time' => '23:59',
            //     'user_id' => '2',
            // ],
            // [
            //     'section_sub' => '520439',
            //     'section_name' => 'Project 3',
            //     'code_inclass' => 'AowoPW',
            //     'deadline_date' => date('2022-30-12'),
            //     'deadline_time' => '23:59',
            //     'user_id' => '2',
            // ],
        ];

        foreach($section as $key => $value) {
            Section::create($value);
        }
    }
}
