<?php

namespace App\Providers;

use App\Services\RoleService;
use App\Services\RoleServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [UserServiceInterface::class, RoleServiceInterface::class];
    }
}
