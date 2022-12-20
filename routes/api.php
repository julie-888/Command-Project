<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/create', [MyUserController::class, 'create']);
Route::get('users', [MyUserController::class, 'list']);
Route::get('user/{id}', [MyUserController::class, 'item']);
Route::put('user/{id}', [MyUserController::class, 'update']);
Route::delete('user/{id}', [MyUserController::class, 'delete']);