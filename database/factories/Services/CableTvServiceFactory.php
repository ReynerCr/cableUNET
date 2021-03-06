<?php

namespace Database\Factories\Services;

use App\Models\Services\CableTvService;
use Illuminate\Database\Eloquent\Factories\Factory;

class CableTvServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CableTvService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(1),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
