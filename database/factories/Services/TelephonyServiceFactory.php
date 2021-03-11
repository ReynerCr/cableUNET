<?php

namespace Database\Factories\Services;

use App\Models\TelephonyService;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelephonyServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TelephonyService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'minutes' => $this->faker->numberBetween(1, 1000),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
