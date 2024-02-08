<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    public function run(): void
    {
        $actions = [
            'Created by',
            'Assigned to',
            'Complete by',
        ];

        foreach ($actions as $action) {
            Action::create([
                'name' => $action,
            ]);
        }
    }
}
