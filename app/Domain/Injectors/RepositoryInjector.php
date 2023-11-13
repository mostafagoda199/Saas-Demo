<?php

namespace App\Domain\Injectors;

use App\Domain\Repositories\Classes\TenantRepository;
use App\Domain\Repositories\Classes\UserRepository;
use App\Domain\Repositories\Interfaces\ITenantRepository;
use App\Domain\Repositories\Interfaces\IUserRepository;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\AppServiceProvider;

class RepositoryInjector extends AppServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(ITenantRepository::class, function () {
            return new TenantRepository(new Tenant());
        });

        $this->app->singleton(IUserRepository::class, function () {
            return new UserRepository(new User());
        });
    }
}
