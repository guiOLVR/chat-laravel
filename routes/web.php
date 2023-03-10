<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::resource('/users', UserController::class)->withTrashed();
Route::delete('/users/{id}/softdelete', [UserController::class, 'softDelete'])->name('users.softDelete');
Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
