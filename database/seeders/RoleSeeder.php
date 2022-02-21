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
                'roles_name' => 'Direktur Utama'
            ],
            [
                'roles_name' => 'Direksi'
            ],
            [
                'roles_name' => 'Pimpinan Divisi'
            ],
            [
                'roles_name' => 'Pimpinan Sub Divisi'
            ],
            [
                'roles_name' => 'Senior Officer'
            ],
            [
                'roles_name' => 'Penyelia'
            ],
            [
                'roles_name' => 'Staff'
            ],
        ];

        foreach($data as $key => $value) {
            Role::create($value);
        }
    }
}
