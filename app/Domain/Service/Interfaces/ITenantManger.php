<?php

namespace App\Domain\Service\Interfaces;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;

interface ITenantManger
{
    /**
     * @param Tenant|Model|null $tenant
     * @param String|null $connection
     * @return $this
     */
    public function setTenant(Tenant|Model|null $tenant, string $connection = null): static;

    /**
     * @return Tenant|null
     */
    public function getTenant(): ?Tenant;

    /**
     * @param string $identifier
     * @return bool
     */
    public function loadTenant(string $identifier): mixed;
}
