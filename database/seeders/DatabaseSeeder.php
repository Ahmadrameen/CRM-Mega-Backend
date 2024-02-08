<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            RequestSeeder::class,
            ActionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            RequestHistorySeeder::class,
        ]);
    }
}
