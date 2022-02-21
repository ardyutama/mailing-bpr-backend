<?php

namespace Database\Factories;

use App\Models\Departement;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
    $departement_id = Departement::all()->pluck('id')->toArray();
        $role_id = Role::all()->pluck('id')->toArray();
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'departement_id'=> $this->faker->randomElement($departement_id),
            'role_id' => $this->faker->randomElement($role_id),
        ];
    }
}
