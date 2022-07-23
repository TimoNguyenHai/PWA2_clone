<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DaySeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(TimeSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UserAdminSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(RegistrationSeeder::class);
    }
}
