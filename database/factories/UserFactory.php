<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
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
        $division_id = Division::all()->pluck('id')->toArray();
        $role_id = Role::all()->pluck('id')->toArray();
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'division_id' => $this->faker->randomElement($division_id),
            'role_id' => $this->faker->randomElement($role_id),
            'NIP' => $this->faker->randomNumber(5, true),
            'password' => $this->faker->password(2,6), // password
        ];
    }
}
