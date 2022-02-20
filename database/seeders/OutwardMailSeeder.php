<?php

namespace Database\Seeders;

use App\Models\OutwardMail;
use Illuminate\Database\Seeder;

class OutwardMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OutwardMail::factory(10)->create();
    }
}
