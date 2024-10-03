<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/websites', [WebsiteController::class, 'store']);
Route::get('/websites', [WebsiteController::class, 'index']);

Route::post('/websites/{website}/posts', [PostController::class, 'store']);
Route::post('/websites/{website}/subscribe', [SubscriptionController::class, 'subscribe']);
