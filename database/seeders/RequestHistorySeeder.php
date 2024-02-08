<?php

namespace Database\Seeders;

use App\Models\RequestHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestHistorySeeder extends Seeder
{
    public function run(): void
    {
        RequestHistory::factory()
            ->count(10)
            ->create();
    }
}
