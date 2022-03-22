<?php

namespace Database\Factories;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApproverFactory extends Factory
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
        return [
            'user_id' => $this->faker->randomElement($id_name),
            'isApproved' => $this->faker->boolean(),
            'approved_time' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'nota_id' => $this->faker->randomElement($id_nota),
        ];
    }
}
