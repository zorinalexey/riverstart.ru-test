<?php

namespace App\Providers;

use App\Services\Categories\CategoryService;
use App\Services\Categories\CategoryServiceInterface;
use App\Services\Products\ProductService;
use App\Services\Products\ProductServiceInterface;
use App\Services\Users\UserService;
use App\Services\Users\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
    }

    public function boot(): void
    {
        //
    }
}
