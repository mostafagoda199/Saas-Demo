<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTenantDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:db {dbname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database for every tenant';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            $dbname = (string) $this->argument('dbname') ?? null;
            DB::disconnect();
            DB::purge('tenant');
            DB::reconnect('tenant');
            Schema::dropDatabaseIfExists((string) $dbname);
            Schema::createDatabase((string) $dbname);
            $this->line("Database $dbname created");
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
