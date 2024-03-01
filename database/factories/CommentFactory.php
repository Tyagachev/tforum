<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $comments= Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reply_user_id' => $this->faker->numberBetween(1, 10),
            'text' => $this->faker->text(255),
            'parent_id' => $this->faker->numberBetween(0, 10)? : null,
            'user_id' => $this->faker->numberBetween(1, 10),
            'topic_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
