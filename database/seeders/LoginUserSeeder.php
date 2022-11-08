<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class LoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'userid' => 'A001',
                'name' => 'Admin',
                'lname' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('123456')
            ],
            // [
            //     'userid' => 'T001',
            //     'name' => 'Teacher',
            //     'lname' => 'teacher',
            //     'email' => 'teacher@teacher.com',
            //     'role' => 'teacher',
            //     'password' => bcrypt('123456'),
            // ],
            // [
            //     'userid' => 'T002',
            //     'name' => 'Teacher2',
            //     'lname' => 'teacher',
            //     'email' => 'teacher2@teacher.com',
            //     'role' => 'teacher',
            //     'password' => bcrypt('123456'),
            // ],
            // [
            //     'userid' => 'S001',
            //     'name' => 'Student',
            //     'lname' => 'student',
            //     'email' => 'student@student.com',
            //     'role' => 'student',
            //     'password' => bcrypt('123456'),
            // ],
            // [
            //     'userid' => 'S002',
            //     'name' => 'Student2',
            //     'lname' => 'student',
            //     'email' => 'student2@student.com',
            //     'role' => 'student',
            //     'password' => bcrypt('123456'),
            // ],
            // [
            //     'userid' => 'S003',
            //     'name' => 'Student3',
            //     'lname' => 'student',
            //     'email' => 'student3@student.com',
            //     'role' => 'student',
            //     'password' => bcrypt('123456'),
            // ],
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
