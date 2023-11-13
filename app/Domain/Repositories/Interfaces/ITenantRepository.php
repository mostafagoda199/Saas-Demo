<?php

namespace App\Domain\Repositories\Interfaces;

interface ITenantRepository
{
    public function getTenantBySlug(string $slug);
}
