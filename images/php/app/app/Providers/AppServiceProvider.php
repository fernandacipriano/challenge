<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(App\Interfaces\TransactionServiceInterface::class, App\Services\TransactionService::class);
        $this->app->bind(App\Interfaces\TransactionRepositoryInterface::class, App\Repositories\TransactionRepository::class);
        $this->app->bind(App\Interfaces\UserRepositoryInterface::class, App\Repositories\UserRepository::class);
        $this->app->bind(App\Interfaces\UserServiceInterface::class, App\Services\UserService::class);
    }
}
