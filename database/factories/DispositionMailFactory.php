<?php

namespace Database\Factories;

use App\Models\DispositionRegister;
use App\Models\Employee;
use App\Models\InboxMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispositionMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_name = User::all()->pluck('id')->toArray();
        // $id_mail =InboxMail::all()->pluck('id')->toArray();
        $id_register = DispositionRegister::all()->pluck('id')->toArray();
        return [
            'register_id' => $this->faker->randomElement($id_register),
            'tgl_disposisi' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'creator_id' => $this->faker->randomElement($id_name),
            'disposisiTo_id' => $this->faker->randomElement($id_name),
            'comment'=> $this->faker->paragraph(mt_rand(3, 5)),
        ];
    }
}
