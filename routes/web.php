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

Route::get('/', function () {
    return redirect(route('home'));
});

Route::prefix('/administrador')->name('admin')->group(function () {
    Route::get('', [AdminController::class, 'home']);

    Route::prefix('usuarios')->name('.users')->group(function () {
        // /administrador/usuarios as admin.users
        Route::get('', [AdminController::class, 'showAllUsers']);
        Route::get('nuevo', [AdminController::class, 'new'])
            ->name('.new');
        Route::post('registrar', [AdminController::class, 'store'])
            ->name('.create');

        Route::prefix('{user}')->where(['[0-9]+'])->name('.id')->group(function () {
            // /administrador/usuarios/{user} as admin.users.id
            Route::get('', [AdminController::class, 'show'])
                ->name('.show');
            Route::put('', [AdminController::class, 'update'])
                ->name('.update');
            Route::delete('', [AdminController::class, 'destroy'])
                ->name('.destroy');
            Route::get('editar', [AdminController::class, 'edit'])
                ->name('.edit');
        });
    });
});

/* Route::get('/usuarios/{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::put('/usuarios/{user}', [UserController::class, 'update'])
    ->where('user', '[0-9]+')
    ->name('users.update');

Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])
    ->where('user', '[0-9]+')
    ->name('users.edit'); */



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/administrador', [AdminController::class, 'home'])
    ->name('admin.home');
Route::get('/usuario', [UserController::class, 'home'])
    ->name('user.home');
