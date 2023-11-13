<?php

declare(strict_types=1);

use Database\Seeders\Tenant\DatabaseSeeder;

return [
    'prefix' => env('DB_PREFIX', 'tenant_'),

    'prefix_test' => env('DB_PREFIX', 'test_tenant_'),

    'tenant_id' => env('DATABASE_TENANT', 1),

    'landlord_connection' => env('DB_CONNECTION', 'mysql'),

    'tenant_connection' => env('TENANT_CONNECTION', 'tenant'),

    /*
     |-----------------------------------------------------------------------
     | Tenant Database Migrations
     |-----------------------------------------------------------------------
     */
    'migrations' => [
        'path' => '/database/migrations/tenants/',
    ],

    'seeder' => [
        'class' => DatabaseSeeder::class,
    ],
];
