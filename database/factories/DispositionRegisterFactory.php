<?php

namespace Database\Factories;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispositionRegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_name = User::all()->pluck('id')->toArray();
        $id_nota = Nota::all()->pluck('id')->toArray();
        // $no_regiser = 
        return [
            // 'no_register' => $this->faker->randomElement($id_register),
            'tgl_register' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'creator_id' => $this->faker->randomElement($id_name),
            'nota_id' => $this->faker->randomElement($id_nota),
        ];
    }
}
