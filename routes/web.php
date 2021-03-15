<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/usuarios', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/usuarios/{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::put('/usuarios/{user}', [UserController::class, 'update'])
    ->where('user', '[0-9]+')
    ->name('users.update');

Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])
    ->where('user', '[0-9]+')
    ->name('users.edit');

Route::get('/usuarios/nuevo', [UserController::class, 'new'])
    ->name('users.new');

Route::post('/usuarios/registrar', [UserController::class, 'store'])
    ->name('users.create');

Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])
    ->where('user', '[0-9]+')
    ->name('users.destroy');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/administrador', [AdminController::class, 'home'])
    ->name('admin.home');
Route::get('/usuario', [UserController::class, 'home'])
    ->name('user.home');
