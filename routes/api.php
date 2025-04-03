<?php

use App\Http\Controllers\controller\api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/create-user', [UserController::class, 'createUser']);