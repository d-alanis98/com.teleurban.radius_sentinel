<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/new', [UserController::class, 'createForm']);
    Route::post('/new', [UserController::class, 'create']);

    Route::prefix('{uri_user}')->group(function () {
        Route::get('/', [UserController::class, 'show']);
        Route::get('/update', [UserController::class, 'updateForm']);
        Route::put('/update', [UserController::class, 'update']);
        Route::delete('/delete', [UserController::class, 'delete']);
    });
});
