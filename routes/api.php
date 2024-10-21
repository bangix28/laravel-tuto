<?php

use App\Http\Controllers\Api\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/post', ApiPostController::class)->middleware('auth:sanctum');
