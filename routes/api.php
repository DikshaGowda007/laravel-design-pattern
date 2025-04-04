<?php

use App\Http\Controllers\controller\api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/create-user', [UserController::class, 'createUser']);
Route::post('/get-user', [UserController::class, 'getUser']);
Route::put('/update-user', [UserController::class, 'updateUser']);
Route::delete('/delete-user', [UserController::class, 'deleteUser']);