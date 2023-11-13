<?php

namespace App\Http\Middleware;

use App\Domain\Service\Interfaces\ITenantManger;
use Closure;
use Illuminate\Http\Request;

class SwitchConnectionByTenantSlug
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (config('database.default') !== 'tenant' && $tenantSlug = request('tenant_slug')) {
            resolve(ITenantManger::class)->loadTenant($tenantSlug);
        }
        return $next($request);
    }
}
