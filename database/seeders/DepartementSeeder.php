<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
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
                'departement_name' => 'IT'
            ],
            [
                'departement_name' => 'SDM'
            ],
            [
                'departement_name' => 'Umum'
            ],
            [
                'departement_name' => 'Kesekretariatan'
            ],
            [
                'departement_name' => 'Public Relation'
            ],
        ];

        foreach ($data as $key => $value) {
            Departement::create($value);
        }
    }
}
