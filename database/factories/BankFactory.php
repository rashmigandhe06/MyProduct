<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_name' => $this->faker->name()." Bank",
            'bank_code' => Str::random(5),
            'address_line1' => $this->faker->streetAddress(),
            'address_line2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'country' => $this->faker->countryCode(),
            'postcode' => $this->faker->postcode()
        ];
    }

}
