<?php

namespace Database\Factories;

use App\Models\ServicePackage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicePackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServicePackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'price' => $this->faker->randomFloat(1, 100),
            'internet_service_id' => $this->faker->randomNumber(0, 5),
            'telephony_service_id' => $this->faker->randomNumber(0, 5),
            'cable_tv_service_id' => $this->faker->randomNumber(0, 5),
        ];
    }
}
