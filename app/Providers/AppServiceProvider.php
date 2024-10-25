<?php

namespace App\Providers;

use App\Services\Classes\OrderService;
use App\Services\Classes\ProductService;
use App\Services\Classes\UserService;
use App\Services\Interfaces\IOrderService;
use App\Services\Interfaces\IProductService;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->scoped(IProductService::class, ProductService::class);
        $this->app->scoped(IOrderService::class, OrderService::class);
        $this->app->scoped(IUserService::class, UserService::class);
    }
}
