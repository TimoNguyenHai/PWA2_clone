<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->catchPhrase(),
            'name_short'   => $this->faker->catchPhrase(),
            'user_id'      => rand(1,5),
            'level_id'     => rand(1,3),
            'day_id'       => rand(1,5),
            'time_id'      => rand(1,2),
            'classroom_id' => rand(1,6),
            'floor'        => rand(1,3),
            'seats'        => rand(1,20),
        ];
    }
}