<?php

use App\Http\Controllers\PostController;

Route::post('/post', [PostController::class, 'store']);