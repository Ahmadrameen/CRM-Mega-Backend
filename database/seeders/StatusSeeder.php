<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Прогресс',
            'Завершенный',
        ];

        foreach ($statuses as $status) {
            Status::create([
                'name' => $status,
            ]);
        }
    }
}
