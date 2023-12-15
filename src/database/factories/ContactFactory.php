<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'sex' => $this->faker->numberBetween(1,2),
            'email' => $this->faker->safeEmail(),
            'postal_code' => $this->faker->numerify('###-####'),
            'address' => $this->faker->prefecture().$this->faker->city().$this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress(),
            'inquiry' => $this->faker->realText($maxNbChars = 120),
            'created_at' => $this->faker->dateTime()
        ];
    }
}
