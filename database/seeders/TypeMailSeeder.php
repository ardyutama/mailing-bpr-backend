<?php

namespace Database\Seeders;

use App\Models\Type_Mail;
use Illuminate\Database\Seeder;

class TypeMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'type_name' => 'Surat Edaran'
            ],
            [
                'type_name' => 'Surat Keputusan'
            ],
            [
                'type_name' => 'Nota'
            ],
            [
                'type_name' => 'Nota'
            ],
        ];

        foreach ($data as $key => $value) {
            Type_Mail::create($value);
        }
    }
}
