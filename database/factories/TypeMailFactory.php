<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_name' => $this->faker->randomElement(['Surat Edaran', 'Surat Keputusan', 'Nota', 'Nota']),
        ];
    }
}
