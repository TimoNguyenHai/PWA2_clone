<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->insert([
            ['classroom' => '101'],
            ['classroom' => '102'],
            ['classroom' => '201'],
            ['classroom' => '202'],
        ]);
    }
}
