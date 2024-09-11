<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PageController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (Request $request) {
    dd('test');
});

// Site routes
Route::post('/site', [SiteController::class, 'store']);

// Post routes
Route::post('/post', [PostController::class, 'store']);

// Page routes
Route::post('/page', [PageController::class, 'store']);
