<?php

namespace Database\Factories;

use App\Models\PackageChangeRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageChangeRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackageChangeRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'suscription_id' => $this->faker->unique()->numberBetween(1, 15),
            'new_sp_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
