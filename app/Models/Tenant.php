<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant as ContractsTenant;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;
use Tenancy\Tenant\Events;

class Tenant extends Model implements ContractsTenant, IdentifiesByHttp
{
    use HasFactory;
    use AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => Events\Created::class,
        'updated' => Events\Updated::class,
        'deleted' => Events\Deleted::class,
    ];

    public function getTenantKey(): int|string
    {
        return str(env('TENANT_DB_PREFIX', 'tenant_') . $this->id)->snake();
    }

    public function tenantIdentificationByHttp(Request $request): ?ContractsTenant
    {
        return match (true) {
            // Route path tenancy
            str_starts_with($request->path(), 'tenant') => $this->query()->where('id', str($request->path())->explode('/')[1])->first(),
            default => null,
        };
    }
}
