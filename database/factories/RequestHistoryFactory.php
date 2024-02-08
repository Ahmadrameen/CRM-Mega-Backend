<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestHistory>
 */
class RequestHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'    => 1,
            'request_id' => $this->faker->randomNumber(1, 10),
            'action_id'  => 1,
            'note'       => $this->faker->text,
        ];
    }
}
