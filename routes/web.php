<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return response()->json([
        'message' => 'Welcome to your dashboard',
        'user' => auth()->user(),
    ]);
})->middleware('auth:sanctum');

Route::get('/', function () {
    return view('welcome');
});
