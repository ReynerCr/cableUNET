<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\PackagesController;
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
    Route::get('', [ClientController::class, 'index'])
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
    // /administrador as admin
    Route::get('', [AdminController::class, 'index'])
        ->name('.home');

    Route::prefix('servicios')->name('.services')->group(function () {
        // /administrador/servicios as admin.services
        Route::prefix('{type}')->where(['type' => '[1-3]'])->name('.type')->group(function () {
            // /administrador/servicios/{service} as admin.services.type
            Route::get('crear', [ServicesController::class, 'create'])
                ->name('.create');
            Route::post('registrar', [ServicesController::class, 'store'])
                ->name('.store');
            Route::get('{id}', [ServicesController::class, 'show'])
                ->where(['id' => '[0-9]+'])
                ->name('.show');
        });
        Route::prefix('canal')->name('.channel')->group(function () {
            // /administrador/servicios/canal as admin.services.channel
            Route::get('', [ChannelsController::class, 'create'])
                ->name('.create');
            Route::post('registrar', [ChannelsController::class, 'store'])
                ->name('.store');
        });
    });
    Route::prefix('paquetes')->name('.packages')->group(function () {
        // /administrador/paquetes as admin.packages
        Route::get('crear', [PackagesController::class, 'create'])
            ->name('.create');
        Route::post('registrar', [PackagesController::class, 'store'])
            ->name('.store');
        Route::get('{package}', [PackagesController::class, 'show'])
            ->where(['package' => '[0-9]+'])
            ->name('.show');
    });


    Route::prefix('usuarios')->name('.users')->group(function () {
        // /administrador/usuarios as admin.users
        Route::get('', [AdminController::class, 'showAllUsers']);
        Route::get('nuevo', [AdminController::class, 'create'])
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
