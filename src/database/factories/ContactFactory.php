<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

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
            'category_id'=>$this->faker->numberBetween(1,5),
            'last_name'=>$this->faker->firstname,
            'first_name' => $this->faker->lastname,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail,
            'address'=> $this->faker->prefecture  . $this->faker->city . $this->faker->streetAddress,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->sentence,
            'tell'=> $this->faker->phoneNumber,
        ];
    }
}
