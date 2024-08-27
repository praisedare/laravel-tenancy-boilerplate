<?php

namespace App\Listeners;

use Tenancy\Hooks\Database\Events\Drivers\Configuring;

class ConfigureTenantDatabase
{
    public function handle(Configuring $event)
    {
        \Log::debug('configure tenant with set configs');
        configureTenantConnection($event);
    }
}

