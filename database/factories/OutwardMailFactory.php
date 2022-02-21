<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Type_Mail;
use App\Models\TypeMail;
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
        $employee_id = User::all()->pluck('employee_id')->toArray();
        $tipe_id = TypeMail::all()->pluck('id')->toArray();
        return [
            'tgl_surat_keluar' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'perihal' => $this->faker->paragraph(mt_rand(3, 5)),
            'tipe_surat_id' => $this->faker->randomElement($tipe_id),
            'sifat_surat' =>
            $this->faker->randomElement(['Terbuka', 'Rahasia', 'Urgent']),
            'pengirim_surat' => $this->faker->randomElement($employee_id),
            'penerima_surat' => $this->faker->randomElement($employee_id),
            'approver'=> $this->faker->randomElement($employee_id),
            'creator_id' => $this->faker->randomElement($employee_id),
        ];
    }
}
