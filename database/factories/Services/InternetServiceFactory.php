<?php

namespace Database\Factories\Services;

use App\Models\Services\InternetService;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternetServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InternetService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'download_speed' => $this->faker->numberBetween(1, 100),
            'upload_speed' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
