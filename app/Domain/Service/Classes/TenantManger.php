<?php

namespace App\Domain\Service\Classes;

use App\Domain\Repositories\Interfaces\ITenantRepository;
use App\Domain\Service\Interfaces\ITenantManger;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TenantManger implements ITenantManger
{
    /**
     * @var Tenant|null
     * @auther Mustafa Goda
     */
    private ?Tenant $tenant = null;

    public function __construct(
        private readonly ITenantRepository $tenantRepository
    ) {
    }

    /**
     * @param Tenant|Model|null $tenant
     * @param String|null $connection
     * @return $this
     * @auther Mustafa Goda
     */
    public function setTenant(Tenant|Model|null $tenant, string $connection = null): static
    {
        $this->tenant = $tenant;

        config([
            'database.connections.' . $connection . '.database' => get_tenant_db_name($this->tenant?->id),
            'database.default' => $connection,
        ]);

        return $this;
    }

    /**
     * @return Tenant|null
     * @auther Mustafa Goda
     */
    public function getTenant(): ?Tenant
    {
        return $this->tenant;
    }

    /**
     * @param $identifier
     * @return bool
     * @auther Mustafa Goda
     */
    public function loadTenant($identifier): mixed
    {
        $tenantBySlug = $this->tenantRepository->getTenantBySlug(slug: $identifier);
        $this->setTenant($tenantBySlug, 'tenant');
        return $tenantBySlug->id;
    }
}
