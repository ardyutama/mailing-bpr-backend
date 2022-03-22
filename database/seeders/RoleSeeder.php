<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'name' => 'Direktur Utama'
            ],
            [
                'name' => 'Direksi'
            ],
            [
                'name' => 'Pimpinan Divisi'
            ],
            [
                'name' => 'Pimpinan Sub Divisi'
            ],
            [
                'name' => 'Senior Officer'
            ],
            [
                'name' => 'Penyelia'
            ],
            [
                'name' => 'Staff'
            ],
        ];

        foreach($data as $key => $value) {
            Role::create($value);
        }
    }
}
