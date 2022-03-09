<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
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
                'division_name' => 'IT'
            ],
            [
                'division_name' => 'SDM'
            ],
            [
                'division_name' => 'Umum'
            ],
            [
                'division_name' => 'Kesekretariatan'
            ],
            [
                'division_name' => 'Public Relation'
            ],
        ];

        foreach ($data as $key => $value) {
            Division::create($value);
        }
    }
}
