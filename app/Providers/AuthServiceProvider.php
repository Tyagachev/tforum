<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Avatar;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\AvatarPolicy;
use App\Policies\CommentPolicy;
use App\Policies\TopicPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => AdminPolicy::class,
        Topic::class => TopicPolicy::class,
        Comment::class => CommentPolicy::class,
        Avatar::class => AvatarPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
