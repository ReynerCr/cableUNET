<?php

namespace Database\Factories\Services\Tv;

use App\Models\Services\Tv\ProgrammeSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProgrammeSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tv_channel_id' => $this->faker->numberBetween(1, 30),
            'starts' => $this->faker->unique()->dateTime('now', '+7 days'),
            'tv_show_name' => $this->faker->sentence(3),
        ];
    }
}
