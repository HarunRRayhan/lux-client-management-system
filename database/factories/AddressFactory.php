<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street'           => $this->faker->streetAddress,
            'line_2'           => $this->faker->secondaryAddress,
            'city'             => $this->faker->city,
            'state'            => $this->faker->state,
            'country'          => $this->faker->country,
            'zip'              => $this->faker->postcode,
            'addressable_type' => User::class,
            'addressable_id'   => User::factory(),
        ];
    }
}
