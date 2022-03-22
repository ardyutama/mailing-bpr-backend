<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = User::all()->pluck('id')->toArray();
        // $division_id =Division::all()->pluck('id')->toArray();
        return [
            'tgl_nota' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'no_nota' => $this->faker->unique()->numberBetween(0,20),
            'perihal' => $this->faker->paragraph(mt_rand(3, 5)),
            'creator_id' =>  $this->faker->randomElement($user_id),
            'receiver_id' =>  $this->faker->randomElement($user_id),
            'openedAt' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'lastOpened_id' =>  $this->faker->randomElement($user_id),
        ];
    }
}
