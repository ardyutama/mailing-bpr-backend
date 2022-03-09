<?php

namespace Database\Seeders;

use App\Models\DispositionRegister;
use Illuminate\Database\Seeder;

class DispositionRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DispositionRegister::factory(5)->create();
    }
}
