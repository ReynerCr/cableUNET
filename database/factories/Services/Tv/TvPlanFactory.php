<?php

namespace Database\Factories\Services\Tv;

use App\Models\TvPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TvPlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TvPlan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tv_channel_id' => $this->faker->randomNumber(1, 30),
            'cable_tv_service_id' => $this->faker->randomNumber(1, 5),
        ];
    }
}
