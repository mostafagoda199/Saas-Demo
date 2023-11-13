<?php

namespace App\Domain\Injectors;

use App\Domain\Service\Classes\AuthService;
use App\Domain\Service\Classes\TenantManger;
use App\Domain\Service\Classes\TenantService;
use App\Domain\Service\Classes\UserService;
use App\Domain\Service\Interfaces\IAuthService;
use App\Domain\Service\Interfaces\ITenantManger;
use App\Domain\Service\Interfaces\ITenantService;
use App\Domain\Service\Interfaces\IUserService;
use App\Domain\Shared\Responder\Classes\ApiHttpResponder;
use App\Domain\Shared\Responder\Interfaces\IApiHttpResponder;
use App\Providers\AppServiceProvider;

class ServiceInjectors extends AppServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(IApiHttpResponder::class, ApiHttpResponder::class);
        $this->app->singleton(ITenantManger::class, TenantManger::class);
        $this->app->singleton(ITenantService::class, TenantService::class);
        $this->app->singleton(IAuthService::class, AuthService::class);
        $this->app->singleton(IUserService::class, UserService::class);
    }
}
