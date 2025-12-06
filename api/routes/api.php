<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChildController;

Route::post('/register', [ChildController::class, 'register']);
Route::get('/child/{qr_code}', [ChildController::class, 'show']);
Route::get('/vaccines', [ChildController::class, 'vaccines']);