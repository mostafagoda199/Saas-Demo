<?php

namespace App\Console\Commands;

use App\Domain\Repositories\Interfaces\ITenantRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MigrateTenantDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {tenantDB?} {--fresh} {--seed} {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate tenants database';

    /**
     * @return void
     */
    public function handle(): void
    {
        if ($tenantDbName = $this->argument('tenantDB')) {
            $this->migrate($tenantDbName);
        }else {
            resolve(ITenantRepository::class)->listAllBy()
                ->each( fn ($tenant) => $this->migrate(get_tenant_db_name($tenant->id)));
        }
    }

    /**
     * @param string $tenantDbName
     * @return void
     * @auther Mustafa Goda
     */
    private function migrate(string $tenantDbName): void
    {
        config([
            'database.connections.tenant.driver' => env('TENANT_CONNECTION', 'mysql'),
            'database.connections.tenant.database' => $tenantDbName,
        ]);
        DB::disconnect();
        DB::purge('tenant');
        DB::reconnect('tenant');

        $this->line('');
        $this->line("-----------------------------------------");
        $this->info("Migrating $tenantDbName");

        $options = [
            '--force' => true,
            '--path' => config('tenancy.migrations.path'),
            '--database' => 'tenant',
        ];

        if ($this->option('seed')) {
            $options['--seed'] = true;
            $options['--seeder'] = config('tenancy.seeder.class');
        }

        if ($this->option('refresh')) {
            Artisan::call('migrate:refresh', $options);
        } else {
            Artisan::call(
                $this->option('fresh') ? 'migrate:fresh' : 'migrate',
                $options
            );
        }

        $this->info("$tenantDbName Migrated");
        $this->line("-----------------------------------------");
    }
}
