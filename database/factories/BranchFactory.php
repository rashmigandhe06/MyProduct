<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_id' => rand(1,10),
            'branch_code' => Str::random(5),
            'address_line1' => $this->faker->streetAddress(),
            'address_line2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'country' => $this->faker->countryCode(),
            'postcode' => $this->faker->postcode()
        ];
    }

}
