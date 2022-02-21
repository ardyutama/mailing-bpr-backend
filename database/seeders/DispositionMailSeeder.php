<?php

namespace Database\Seeders;

use App\Models\DispositionMail;
use Illuminate\Database\Seeder;

class DispositionMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DispositionMail::factory(5)->create();
    }
}
