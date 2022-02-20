<?php

namespace Database\Seeders;

use App\Models\InboxMail;
use Illuminate\Database\Seeder;

class InboxMailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InboxMail::factory(10)->create();
    }
}
