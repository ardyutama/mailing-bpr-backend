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
        $division_id =Division::all()->pluck('id')->toArray();
        return [
            'tgl_nota' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'no_nota' => $this->faker->randomDigit(),
            'perihal' => $this->faker->paragraph(mt_rand(3, 5)),
            'creator_id' =>  $this->faker->randomElement($user_id),
            'approver_id' =>  $this->faker->randomElement($user_id),
            'isApproved' => $this->faker->boolean(),
            'division_id' => $this->faker->randomElement($division_id),
            'receiver_id' =>  $this->faker->randomElement($user_id),
            'openedAt' => $this->faker->dateTimeBetween('-1 week', 'now'),
            // 'openedTime' => $this->faker->time(),
            'lastOpened_id' =>  $this->faker->randomElement($user_id),
        ];
    }
}
