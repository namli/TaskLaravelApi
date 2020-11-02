<?php

namespace Database\Factories;

use App\Models\Offices;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offices::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'address' => $this->faker->address,
        ];
    }
}
