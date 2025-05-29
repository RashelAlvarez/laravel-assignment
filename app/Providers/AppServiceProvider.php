<?php

namespace App\Providers;

use App\Models\Comment;
use App\Services\Comment\CommentCountInterface;
use App\Services\Comment\CommentCountService;
use App\Services\comment\CommentInterface;
use App\Services\comment\CommentService;
use App\Services\user\UserInterface;
use App\Services\user\UserService;
use Illuminate\Support\ServiceProvider;
use App\Services\post\PostInterface;
use App\Services\post\PostService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserInterface::class, UserService::class);
        $this->app->bind(PostInterface::class, PostService::class);
        $this->app->bind(CommentInterface::class, CommentService::class);
        $this->app->bind(CommentCountInterface::class, CommentCountService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
