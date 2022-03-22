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
                'name' => 'IT'
            ],
            [
                'name' => 'SDM'
            ],
            [
                'name' => 'Umum'
            ],
            [
                'name' => 'Kesekretariatan'
            ],
            [
                'name' => 'Public Relation'
            ],
        ];

        foreach ($data as $key => $value) {
            Division::create($value);
        }
    }
}
