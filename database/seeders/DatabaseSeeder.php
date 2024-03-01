<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\News;
use App\Models\Theme;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
        News::factory(10)->create();
        Theme::factory(3)->create();
        Topic::factory(20)->create();
        Comment::factory(1000)->create();
    }
}
