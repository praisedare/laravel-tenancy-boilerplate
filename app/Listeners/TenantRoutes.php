<?php


namespace App\Listeners;

use Tenancy\Affects\Routes\Events\ConfigureRoutes;

class TenantRoutes 
{
    public function handle(ConfigureRoutes $event) 
    {
        dump('coniguring routes');
        $event
            ->fromFile(
                ['middleware' => ['web']],
                base_path('/routes/tenant.php')
            );
    }
}

