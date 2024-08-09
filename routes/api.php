<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\InteractionController;
use Illuminate\Support\Facades\Route;

Route::post('sign-in', [AuthController::class, 'signIn']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('ideas', [IdeaController::class, 'index']);
    Route::post('idea', [IdeaController::class, 'show']);
    Route::post('update-or-create', [IdeaController::class, 'updateOrCreate']);

    Route::post('interaction', [InteractionController::class, 'interaction']);
});
