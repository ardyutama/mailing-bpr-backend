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
            'NIP' => $this->faker->randomNumber(5,true),
            'password' => '$2y$10$MNI\/4rABVeiLvdXs9Hacy.mXY0hezO\/6Lz5a2.TJ7KIQV.DEIx7z6', // password
            'departement_id'=> $this->faker->randomElement($departement_id),
            'role_id' => $this->faker->randomElement($role_id),
        ];
    }
}
