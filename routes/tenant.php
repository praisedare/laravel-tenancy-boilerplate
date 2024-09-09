<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tenancy\Identification\Drivers\Http\Middleware\EagerIdentification;

Route::middleware(EagerIdentification::class)->group(function() {
    Route::get('tenant/{tenant}', function(Request $request) {
        return "At ";
    });
});

