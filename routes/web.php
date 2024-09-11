<?php

use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'show']);