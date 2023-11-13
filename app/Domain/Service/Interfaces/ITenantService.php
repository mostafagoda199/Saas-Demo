<?php

namespace App\Domain\Service\Interfaces;

interface ITenantService
{
    public function createNewTenant(array $tenantData);
}
