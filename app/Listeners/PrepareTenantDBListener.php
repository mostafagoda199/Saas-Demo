<?php

namespace App\Listeners;

use App\Events\PrepareTenantDBEvent;
use App\Jobs\DatabaseForTenantJob;
use Illuminate\Support\Facades\Cache;

class PrepareTenantDBListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PrepareTenantDBEvent $event): void
    {
        DatabaseForTenantJob::dispatch($event->tenant->id);
    }
}
