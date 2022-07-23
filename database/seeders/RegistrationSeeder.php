<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registrations')->insert([
            [
                'user_id'   => '5',
                'course_id' => '1',
            ],
            [
                'user_id'   => '5',
                'course_id' => '4',
            ],
            [
                'user_id'   => '5',
                'course_id' => '9',
            ],
            [
                'user_id'   => '6',
                'course_id' => '2',
            ],
            [
                'user_id'   => '6',
                'course_id' => '4',
            ],
            [
                'user_id'   => '6',
                'course_id' => '7',
            ],
            [
                'user_id'   => '7',
                'course_id' => '2',
            ],
            [
                'user_id'   => '7',
                'course_id' => '5',
            ],
            [
                'user_id'   => '7',
                'course_id' => '8',
            ],
            [
                'user_id'   => '8',
                'course_id' => '2',
            ],
            [
                'user_id'   => '8',
                'course_id' => '4',
            ],
            [
                'user_id'   => '8',
                'course_id' => '7',
            ],
            [
                'user_id'   => '9',
                'course_id' => '3',
            ],
            [
                'user_id'   => '9',
                'course_id' => '5',
            ],
            [
                'user_id'   => '9',
                'course_id' => '7',
            ],
            [
                'user_id'   => '10',
                'course_id' => '1',
            ],
            [
                'user_id'   => '10',
                'course_id' => '5',
            ],
            [
                'user_id'   => '10',
                'course_id' => '9',
            ],
            [
                'user_id'   => '11',
                'course_id' => '2',
            ],
            [
                'user_id'   => '11',
                'course_id' => '5',
            ],[
                'user_id'   => '11',
                'course_id' => '9',
            ],
        ]);
    }
}
