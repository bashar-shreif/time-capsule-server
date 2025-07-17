<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PrivacySetting;
use App\Models\RevealMode;
use App\Models\Mood;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capsule>
 */
class CapsuleFactory extends Factory
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
            'privacy_settings_id' => 1,
            'reveal_mode_id' => 1,
            'mood_id' => Mood::factory(),
            'country_id' => Country::factory(),
            'message' => $this->faker->paragraph(3),
            'revealed_at' => $this->faker->optional()->dateTime,
        ];
    }
}
