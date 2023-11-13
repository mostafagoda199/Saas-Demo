<?php

namespace App\Domain\Repositories\Classes;

use App\Domain\Repositories\Interfaces\ITenantRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TenantRepository extends AbstractRepository implements ITenantRepository
{
    public function getTenantBySlug(string $slug): Model|Builder|\Illuminate\Database\Query\Builder
    {
       return Cache::store('file')->rememberForever($slug,function () use ($slug){
            return $this->firstOrFail(conditions: ['slug' => $slug]);
        });
    }
}
