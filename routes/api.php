<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', [UserController::class, 'index']);

//Route::get('/test/{id}', [UserController::class, 'index']);

Route::post('/test', [UserController::class, 'store']);

Route::put('/test/{id}', [UserController::class, 'index']);

Route::delete('/test/{id}', [UserController::class, 'delete']);