<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PlotArcController;
use App\Http\Controllers\PlotPointController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\WorldElementController;
use App\Http\Controllers\LocationController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Authentication Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Route to get authenticated user's details
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Secured routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResource('novels', NovelController::class);
    Route::apiResource('novels.chapters', ChapterController::class);
    Route::apiResource('novels.chapters.scenes', SceneController::class);
    Route::apiResource('novels.characters', CharacterController::class);
    Route::apiResource('novels.plot_arcs', PlotArcController::class);
    Route::apiResource('plot_arcs.plot_points', PlotPointController::class);
    Route::apiResource('novels.world-elements', WorldElementController::class);
    Route::apiResource('novels.locations', LocationController::class);

    Route::apiResource('novels.goals', GoalController::class);
    Route::apiResource('goals.progress', ProgressController::class);
    Route::get('goals-overview', [GoalController::class, 'goalsOverview']);
});
