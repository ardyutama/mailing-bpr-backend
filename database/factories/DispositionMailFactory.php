<?php

namespace Database\Factories;

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
        $id_name = User::all()->pluck('employee_id')->toArray();
        $id_mail =InboxMail::all()->pluck('id')->toArray();
        return [
            'tgl_isi' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'pengirim_id' => $this->faker->randomElement($id_name),
            'penerima_id' => $this->faker->randomElement($id_name),
            'isi_disposisi'=> $this->faker->paragraph(mt_rand(3, 5)),
            'inbox_id' => $this->faker->randomElement($id_mail),
        ];
    }
}
