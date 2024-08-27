<?php

use Tenancy\Affects\Connections\Events\Drivers\Configuring as DriversConfiguring;
use Tenancy\Hooks\Database\Events\Drivers\Configuring as AffectsConfiguring;
use Tenancy\Identification\Contracts\Tenant;

function configureTenantConnection(AffectsConfiguring|DriversConfiguring $event)
{
    $defaults = $event->defaults($event->tenant);

    $event->useConnection('mysql', [
        ...$defaults,
        // $defaults['database'] will be the id of the created tenant model,
        // and we don't want that to be the name of our database
        'database' => str(env('TENANT_DB_PREFIX', 'tenant_') . $defaults['database'])->snake(),
        'host' => '%',
        // 'database' => str(config('app.name') . $defaults['database'])->snake(),
    ]);
}

