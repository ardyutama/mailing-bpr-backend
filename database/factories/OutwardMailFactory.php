<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Type_Mail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutwardMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $nama_employee = User::all()->pluck('first_name')->toArray();
        $id_name = User::all()->pluck('id')->toArray();
        $tipe_id = Type_Mail::all()->pluck('id')->toArray();
        return [
            'tgl_surat_keluar' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'perihal' => $this->faker->paragraph(mt_rand(3, 5)),
            'tipe_surat_id' => $this->faker->randomElement($tipe_id),
            'sifat_surat' =>
            $this->faker->randomElement(['Terbuka', 'Rahasia', 'Urgent']),
            'pengirim_surat' => $this->faker->randomElement($id_name),
            'penerima_surat' => $this->faker->randomElement($id_name),
            'approver'=> $this->faker->randomElement($id_name),
            'creator_id' => $this->faker->randomElement($id_name),
        ];
    }
}
