<?php

namespace App\Listeners;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureTenantConnection
{
    public function handle(Configuring $event)
    {
        // $defaults = $event->defaults($event->tenant);
        //
        // $event->useConnection('mysql', dump([
        //     ...$defaults,
        //     'database' => str(env('TENANT_DB_PREFIX', 'tenant_') . $defaults['database'])->snake(),
        // ]));
        $event->useConnection('mysql', $event->defaults($event->tenant));
        dump($event->configuration);
    }
}

