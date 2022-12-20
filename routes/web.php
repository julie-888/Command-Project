<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUserController;

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

Route::post('user/create', [MyUserController::class, 'create']);
Route::get('users', [MyUserController::class, 'list']);
Route::get('user/{id}', [MyUserController::class, 'item']);
Route::put('user/{id}', [MyUserController::class, 'update']);
Route::delete('user/{id}', [MyUserController::class, 'delete']);
