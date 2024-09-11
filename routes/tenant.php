<?php

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tenancy\Identification\Drivers\Http\Middleware\EagerIdentification;

Route::middleware(EagerIdentification::class)->group(function() {
    Route::get('tenant/{tenant}', function(Request $request, Tenant $tenant) {
        dump(DB::select('select database()')[0]); // Still showing central database
        dump(\Tenancy\Facades\Tenancy::getTenant());
        // return "At tenant route $tenant->id";
    });
});

