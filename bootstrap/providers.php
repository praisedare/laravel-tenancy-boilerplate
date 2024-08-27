<?php

return [
    App\Providers\AppServiceProvider::class,

    /*
     * Tenancy\Tenancy Service Providers
     */
    Tenancy\Affects\Broadcasts\Provider::class,
    Tenancy\Affects\Cache\Provider::class,
    Tenancy\Affects\Configs\Provider::class,
    Tenancy\Affects\Connections\Provider::class,
    Tenancy\Affects\Filesystems\Provider::class,
    Tenancy\Affects\Logs\Provider::class,
    Tenancy\Affects\Mails\Provider::class,
    Tenancy\Affects\Models\Provider::class,
    Tenancy\Affects\Routes\Provider::class,
    Tenancy\Affects\URLs\Provider::class,
    Tenancy\Affects\Views\Provider::class,

    Tenancy\Hooks\Database\Provider::class,
    Tenancy\Hooks\Migration\Provider::class,
    Tenancy\Hooks\Hostname\Provider::class,

    Tenancy\Database\Drivers\Mysql\Provider::class,
    Tenancy\Database\Drivers\Sqlite\Provider::class,
];
