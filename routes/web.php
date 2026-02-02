<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


Route::controller(IndexController::class)->group(function (){
    Route::get('/tasks', 'getTasks');
    Route::get('/tasks/{id}', 'getTask');

    Route::post('/tasks', 'createTask');
    Route::put('/tasks/{id}', 'updateTask');
    Route::delete('/tasks/{id}', 'deleteTask');
});
