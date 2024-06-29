<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Content;

class ContentFactory extends Factory
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
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'gender'=>$this->faker->numberBetween(1,3),
            'email'=>$this->faker->email,
            'tell'=>$this->faker->phoneNumber,
            'address'=>$this->faker->address,
            'detail'=>$this->faker->realText(50)
        ];
    }
}
