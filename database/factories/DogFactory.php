<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->url('https://loremflickr.com/320/240/dog'),
        ];
    }
}
