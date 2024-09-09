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

    public function tenantIdentificationByHttp(Request $request): ?ContractsTenant
    {
        return $this->query()->where('id', $request->get('tenant'))->first();
    }
}
