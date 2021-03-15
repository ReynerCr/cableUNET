<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/', function () {
    return redirect(route('home'));
});

Auth::routes();

Route::prefix('/cliente')->name('client')->group(function () {
    // /cliente as client
    Route::get('', [ClientController::class, 'home'])
        ->name('.home');
    Route::prefix('{user}')->where(['[0-9]+'])->name('.id')->group(function () {
        // /cliente/{user} as client.id
        Route::get('', [ClientController::class, 'show'])
            ->name('.show');
        Route::put('', [ClientController::class, 'update'])
            ->name('.update');
        Route::get('editar', [ClientController::class, 'edit'])
            ->name('.edit');
    });
});

Route::prefix('/administrador')->name('admin')->group(function () {
    Route::get('', [AdminController::class, 'home'])
        ->name('.home');

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
