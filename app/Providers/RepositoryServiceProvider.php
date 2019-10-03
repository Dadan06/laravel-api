<?php

namespace App\Providers;

use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [UserRepositoryInterface::class, RoleRepositoryInterface::class];
    }
}
