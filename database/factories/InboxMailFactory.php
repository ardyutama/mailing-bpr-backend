<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Type_Mail;
use App\Models\TypeMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InboxMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_name = User::all()->pluck('employee_id')->toArray();
        $tipe_id = TypeMail::all()->pluck('id')->toArray();
        return [
            'tgl_surat_masuk' => $this->faker->dateTimeBetween('-1 week','now'),
            'perihal' => $this->faker->paragraph(mt_rand(3,5)),
            'tipe_surat_id'=> $this->faker->randomElement($tipe_id),
            'sifat_surat'=>
            $this->faker->randomElement(['Terbuka', 'Rahasia', 'Urgent']),
            'isOpened'=> $this->faker->boolean(),
            'pengirim_surat'=> $this->faker->randomElement($id_name),
            'penerima_surat' => $this->faker->randomElement($id_name),
            'creator_id'=>  $this->faker->randomElement($id_name),
        ];
    }
}
