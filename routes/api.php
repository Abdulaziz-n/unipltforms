<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'auth'], function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::group(['middleware' => 'is_admin'], function (){

        Route::get('company', [CompanyController::class, 'index']);
        Route::post('company', [CompanyController::class, 'store']);
        Route::get('company/{company}', [CompanyController::class, 'view']);
        Route::put('company/{company}', [CompanyController::class, 'update']);
        Route::delete('company/{company}', [CompanyController::class, 'destroy']);

        Route::group(['prefix' => 'user'], function (){

            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{user}', [UserController::class, 'view']);
            Route::put('/{user}', [UserController::class, 'update']);
            Route::delete('/{user}', [UserController::class, 'destroy']);

        });

        Route::group(['prefix' => 'worker'], function (){

            Route::get('/', [WorkerController::class, 'index']);
            Route::post('/', [WorkerController::class, 'store']);
            Route::get('/{worker}', [WorkerController::class, 'view']);
            Route::put('/{worker}', [WorkerController::class, 'update']);
            Route::delete('/{worker}', [WorkerController::class, 'destroy']);

        });

        Route::group(['prefix' => 'user/worker'], function (){

            Route::get('/', [WorkerController::class, 'index']);
            Route::post('/', [WorkerController::class, 'store']);
            Route::get('/{worker}', [WorkerController::class, 'view']);
            Route::put('/{worker}', [WorkerController::class, 'update']);
            Route::delete('/{worker}', [WorkerController::class, 'destroy']);

        });

    });







});


