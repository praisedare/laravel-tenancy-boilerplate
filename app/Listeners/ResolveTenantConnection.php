<?php

namespace App\Listeners;

use Tenancy\Identification\Contracts\Tenant;
use Tenancy\Affects\Connections\Contracts\ProvidesConfiguration;
use Tenancy\Affects\Connections\Events\Drivers\Configuring;
use Tenancy\Affects\Connections\Events\Resolving;

class ResolveTenantConnection implements ProvidesConfiguration
{
    public function handle(Resolving $event)
    {
        return $this;
    }

    public function configure(Tenant $tenant): array
    {
        \Log::debug('resolving tenant config');
        $config = [];

        event(new Configuring($tenant, $config, $this));
        \Log::debug('resolved with: ' . json_encode($config));

        return $config;
    }
}

