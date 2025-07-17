<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mood>
 */
class MoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mood' => $this->faker->randomElement([
                'happy',
                'sad',
                'excited',
                'calm',
                'anxious',
                'peaceful',
                'energetic',
                'melancholic',
                'optimistic',
                'nostalgic'
            ]),

        ];
    }
}
