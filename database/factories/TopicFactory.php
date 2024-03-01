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
            'title' => $this->faker->title(),
            'text' => $this->faker->text(200),
            'tag_topic' => $this->faker->text(5),
            'view_count' => $this->faker->randomNumber(2),
            'user_id' => $this->faker->randomNumber(1),
            'theme_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
