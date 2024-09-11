<?php

use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'show'])->middleware(\App\Http\Middleware\DetectDomain::class);
