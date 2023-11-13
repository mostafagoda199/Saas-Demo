<?php

if (! function_exists('get_tenant_db_name')) {
    /**
     * @param int $tenantId
     * @return string
     */
    function get_tenant_db_name(int $tenantId): string
    {
        return get_tenant_db_prefix_by_env() . $tenantId;
    }
}

if (! function_exists('get_tenant_db_prefix_by_env')) {
    /**
     * @return string
     */
    function get_tenant_db_prefix_by_env(): string
    {
        return (config('app.env') === 'testing') ? config('tenancy.prefix_test') : config('tenancy.prefix');
    }
}

if (! function_exists('get_current_connection')) {
    /**
     * @return string
     */
    function get_current_connection(): string
    {
        return request()->route('tenant') ?
            env('TENANT_CONNECTION', 'tenant') :
            env('DB_CONNECTION', 'mysql');
    }
}
