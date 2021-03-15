<?php

namespace Database\Factories\Services\Tv;

use App\Models\Services\Tv\TvChannel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TvChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TvChannel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(1),
            'description' => $this->faker->sentence(10),
        ];
    }
}
