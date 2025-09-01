<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MinsaDataController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\TopographyControlador;
use App\Http\Controllers\CodeCausesDeathController;


use App\Http\Controllers\MorfologiaControlador;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('authentification');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/create-cuenta', function () {
    return view('Auth.register');
})->name('user-created');

Route::get('/otra-vista', function () {
    return view('otra-vista');
})->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/bienvenido', [WelcomeController::class, 'index'])->name('welcome');

    Route::group(['prefix' => 'usuario', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/nuevo', [UserController::class, 'create'])->name('create');
        Route::post('/guardar', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    });

    Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
    Route::put('/perfil', [UserController::class, 'actualizarPerfil'])->name('perfil.update');

    Route::resource('users', UserController::class)->except(['show'])->middleware('auth');
    Route::resource('roles', RoleController::class);
});

Route::middleware(['auth', 'role:epidemiologo'])->group(function () {
    Route::get('/epidemiologo/dashboard', function () {
        return view('epidemiologo.dashboard');
    })->name('epidemiologo.dashboard');
});
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');

Route::resource('permissions', PermissionController::class);
Route::get('/minsa-data', [MinsaDataController::class, 'index'])->name('minsa-data.list');
Route::get('/minsa-data/{historia_clinica}/edit', [MinsaDataController::class, 'edit'])->name('minsa.edit');
Route::put('/minsa-data/{historia_clinica}', [MinsaDataController::class, 'update'])->name('minsa.update');
//Vista ENVIADO
Route::get('/minsa/envio', [MinsaDataController::class, 'envio'])->name('minsa.envio');
Route::get('/diagnostic/search', [DiagnosticController::class, 'search']);

//26v1
Route::get('/topography/search', [TopographyControlador::class, 'search']);
//26v2
Route::get('/morfologia/search', [MorfologiaControlador::class, 'search']);
//27v1
Route::get('/causes-death/search', [CodeCausesDeathController::class, 'search']);

