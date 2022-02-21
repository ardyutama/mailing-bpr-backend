<?php

namespace Database\Seeders;

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
            DepartementSeeder::class,
            RoleSeeder::class,
            EmployeeSeeder::class,
            TypeMailSeeder::class,
            InboxMailSeeder::class,
            OutwardMailSeeder::class,
            DispositionMailSeeder::class,
        ]);
    }
}
