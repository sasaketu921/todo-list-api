<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::apiResource('/test', TodoController::class);
