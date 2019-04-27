<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Post\PostInterface', 'App\Repositories\Post\PostRepo');
        $this->app->bind('App\Repositories\Category\CategoryInterface', 'App\Repositories\Category\CategoryRepo');
        $this->app->bind('App\Repositories\Comment\CommentInterface', 'App\Repositories\Comment\CommentRepo');
    }
}
