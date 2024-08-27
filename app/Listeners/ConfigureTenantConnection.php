<?php

namespace App\Listeners;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureTenantConnection
{
    public function handle(Configuring $event)
    {
        \Log::debug('in config_tenant_conn handler');
        $defaults = $event->defaults($event->tenant);
        dump($event->useConnection('mysql', [
            ...$defaults,
            'database' => str(env('TENANT_DB_PREFIX', 'tenant_') . $defaults['database'])->snake(),
        ]));
    }
}

