<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    protected $topics = Topic::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'text' => fake()->text(200),
            'tag_topic' => fake()->text(5),
            'view_count' => fake()->randomNumber(),
            'user_id' => 1,
            'theme_id' => 1
        ];
    }
}
