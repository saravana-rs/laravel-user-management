<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::prefix('v1')->middleware('api')->group(function () {
    Route::middleware('throttle:60,1')->get('/users/{user_id}', [UserController::class, 'show'])
        ->name('api.users.show');
});