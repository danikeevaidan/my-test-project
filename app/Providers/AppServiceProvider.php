<?php

namespace App\Providers;


use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];
    protected $listen = [
        \App\Events\PostCreated::class => [
            \App\Listeners\NotifySubscribers::class,
        ],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
