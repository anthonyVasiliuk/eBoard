<?php

namespace Database\Factories;

use App\Enums\EventStatusEnum;
use App\Enums\EventTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->jobTitle,
            'description' => fake()->text,
            'status' => fake()->randomElement(EventStatusEnum::cases()),
            'type' => fake()->randomElement(EventTypeEnum::cases()),
            'date_start' => null,
            'date_end' => null,
        ];
    }
}
