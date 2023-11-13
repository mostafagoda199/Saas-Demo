<?php

namespace App\Domain\Service\Classes;

use App\Domain\Repositories\Interfaces\ITenantRepository;
use App\Domain\Service\Interfaces\ITenantService;

class TenantService implements ITenantService
{
    public function __construct(private readonly ITenantRepository $tenantRepository)
    {
    }

    public function createNewTenant(array $tenantData)
    {
       return $this->tenantRepository->create($tenantData);
    }
}
