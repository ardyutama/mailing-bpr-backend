<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'roles_name' => $this->faker->randomElement(['Direktur Utama', 'Direksi', 'Pimpinan Divisi', 'Pimpinan Sub Divisi', 'Penyelia', 'Staff']),
        ];
    }
}
