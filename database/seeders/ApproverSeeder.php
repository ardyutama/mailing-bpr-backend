<?php

namespace Database\Seeders;

use App\Models\Approver;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApproverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Approver::factory(10)->create();
    }
}
