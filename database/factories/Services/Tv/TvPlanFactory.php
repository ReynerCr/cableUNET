<?php

namespace Database\Factories\Services\Tv;

use App\Models\Services\Tv\TvPlan;
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
        $str = explode(' ', $this->faker->unique()->regexify('[1-5] [0-2][1-9]'));
        return [
            'cable_tv_service_id' => intval($str[0]),
            'tv_channel_id' => intval($str[1]),
        ];
    }
}
