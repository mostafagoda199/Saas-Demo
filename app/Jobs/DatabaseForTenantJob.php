<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class DatabaseForTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param int $tenantId
     * @auther Mustafa Goda
     */
    public function __construct(
        private readonly int $tenantId
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $dbTenantName = get_tenant_db_name($this->tenantId);
        Artisan::call('create:db', [
            'dbname' => $dbTenantName,
        ]);
        Artisan::call('tenants:migrate', [
            'tenantDB' => $dbTenantName,
            '--refresh' => true,
            '--seed' => true,
        ]);
        Artisan::call('config:cache');
    }
}
