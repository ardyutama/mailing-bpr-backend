<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_name = Employee::all()->pluck('id')->toArray();
        return [
            'NIP' => $this->faker->randomNumber(5, true),
            'password' => $this->faker->password(2,6), // password
            "employee_id" => $this->faker->unique()->randomElement($id_name),
        ];
    }
}
