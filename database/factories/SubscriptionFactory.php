<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-10 day' );
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'service_package_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
