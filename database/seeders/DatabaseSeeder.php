<?php

namespace Database\Seeders;

use App\Models\Approver;
use App\Models\Division;
use App\Models\Nota;
use App\Models\OutwardMail;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            DivisionSeeder::class,
            UserSeeder::class,
            NotaSeeder::class,
            ApproverSeeder::class,
            DispositionRegisterSeeder::class,
            DispositionMailSeeder::class,
        ]);
    }
}
