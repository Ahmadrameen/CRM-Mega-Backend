<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestHistoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Default route resource for the API
Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('statuses', StatusController::class);
    Route::apiResource('requests', RequestController::class);
    Route::apiResource('roles', RoleController::class);

    // Custom routes
    Route::get('/change-request-status/{request}/{status}', [RequestController::class, 'changeStatus']);
    Route::get('/search-customer-by-phone/{phone}', [CustomerController::class, 'searchCustomerByPhone']);
    Route::get('/actions', [ActionController::class, 'index']);
    Route::get('/all-users', [UserController::class, 'allUsers']);
    Route::get('/user/{user}', [UserController::class, 'specificUser']);
    Route::get('/request-histories/{request}', [RequestHistoryController::class, 'index']);
});
