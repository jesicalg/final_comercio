<?php

namespace App\Providers;

use App\Repositories\CategoriesEloquentRepository;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\CustomerRepository;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\CustomerEloquentRepository;
use App\Repositories\PostEloquentRepository;
use App\Repositories\ProductEloquentRepository;
use App\Repositories\UserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        UserRepository::class => UserEloquentRepository::class,
        ProductRepository::class => ProductEloquentRepository::class,
        CustomerRepository::class => CustomerEloquentRepository::class,
        PostRepository::class => PostEloquentRepository::class,
        CategoriesRepository::class => CategoriesEloquentRepository::class
    ];

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
        //
    }
}
