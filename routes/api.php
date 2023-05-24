<?php

use App\Http\ApiV1\Modules\Desk\Controllers\DeskController;
use App\Http\ApiV1\Modules\Lists\Controllers\ListsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    //Desk
    Route::get('/desks', [DeskController::class, 'index']);
    Route::post('/desks', [DeskController::class, 'post']);
    Route::get('/desks/{id}', [DeskController::class, 'get']);
    Route::put('/desks/{id}', [DeskController::class, 'put']);
    Route::patch('/desks/{id}', [DeskController::class, 'patch']);
    Route::delete('/desks/{id}', [
        DeskController::class,
        'delete'
        ]);

    //Lists
    Route::get('/lists', [ListsController::class, 'index']);
    Route::post('/lists', [ListsController::class, 'post']);
    Route::get('/lists/{id}', [ListsController::class, 'get']);
    Route::put('/lists/{id}', [ListsController::class, 'put']);
    Route::patch('/lists/{id}', [ListsController::class, 'patch']);
    Route::delete('/lists/{id}', [
        ListsController::class,
        'delete'
    ]);
});
