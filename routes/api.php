<?php

use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;

// Site routes
Route::post('/site', [SiteController::class, 'store']);

// Post routes
Route::post('/post', [PostController::class, 'store']);

// Page routes
Route::post('/page', [PageController::class, 'store']);
