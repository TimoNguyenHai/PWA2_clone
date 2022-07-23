<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Course;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('courses')->insert([
        [
            'name'         => 'English',
            'name_short'   => 'EN',
            'user_id'      => '1',
            'level_id'     => '3',
            'day_id'       => '1',
            'time_id'      => '1',
            'classroom_id' => '1',
            'floor'        => '1',
            'seats'        => '10'
        ],

        [
            'name'         => 'English',
            'name_short'   => 'EN',
            'user_id'      => '2',
            'level_id'     => '2',
            'day_id'       => '1',
            'time_id'      => '2',
            'classroom_id' => '1',
            'floor'        => '1',
            'seats'        => '10'
        ],

        [
            'name'         => 'English',
            'name_short'   => 'EN',
            'user_id'      => '3',
            'level_id'     => '1',
            'day_id'       => '2',
            'time_id'      => '1',
            'classroom_id' => '2',
            'floor'        => '2',
            'seats'        => '10'
        ],

        // Nemcina

        [
            'name'         => 'German',
            'name_short'   => 'DE',
            'user_id'      => '3',
            'level_id'     => '1',
            'day_id'       => '2',
            'time_id'      => '2',
            'classroom_id' => '3',
            'floor'        => '2',
            'seats'        => '10',
        ],

        [
            'name'         => 'German',
            'name_short'   => 'DE',
            'user_id'      => '1',
            'level_id'     => '2',
            'day_id'       => '3',
            'time_id'      => '1',
            'classroom_id' => '3',
            'floor'        => '2',
            'seats'        => '10',
        ],

        [
            'name'         => 'German',
            'name_short'   => 'DE',
            'user_id'      => '2',
            'level_id'     => '3',
            'day_id'       => '3',
            'time_id'      => '2',
            'classroom_id' => '4',
            'floor'        => '2',
            'seats'        => '10',
        ],

        // Vietnamcina

        [
            'name'         => 'Vietnamese',
            'name_short'   => 'VI',
            'user_id'      => '4',
            'level_id'     => '1',
            'day_id'       => '4',
            'time_id'      => '1',
            'classroom_id' => '3',
            'floor'        => '2',
            'seats'        => '10',
        ],

        [
            'name'         => 'Vietnamese',
            'name_short'   => 'VI',
            'user_id'      => '4',
            'level_id'     => '2',
            'day_id'       => '4',
            'time_id'      => '2',
            'classroom_id' => '4',
            'floor'        => '2',
            'seats'        => '10',
        ],

        [
            'name'         => 'Vietnamese',
            'name_short'   => 'VI',
            'user_id'      => '4',
            'level_id'     => '3',
            'day_id'       => '5',
            'time_id'      => '1',
            'classroom_id' => '2',
            'floor'        => '1',
            'seats'        => '10',
        ],

    ]);

    }
}

