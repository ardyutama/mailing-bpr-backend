<?php

namespace Database\Factories;

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
        return [
            'tgl_surat_masuk' => $this->faker->dateTimeBetween('-1 week','now'),
            'perihal' => $this->faker->paragraph(mt_rand(3,5)),
            'tipe_surat_id'=> mt_rand(1,3),
            'isOpened'=> $this->faker->boolean(),
            'pengirim_surat_id'=> mt_rand(1,10),
            'penerima_surat_id' => mt_rand(1, 10),
            'creator_id'=> mt_rand(1,10),
        ];
    }
}
