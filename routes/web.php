<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('produk', ProdukController::class)->middleware(['auth']);

Route::controller(ProdukController::class)->middleware(['auth'])->group(function() {
    Route::get('/api/books', 'index')->name('buku');
    Route::get('/api/books/add', 'create')->name('t_buku');
    Route::post('/api/books/add', 'store')->name('aksi_t_buku');
    Route::get('/api/books/{id}/edit', 'edit')->name('e_buku');
    Route::put('/api/books/{id}/edit', 'update')->name('aksi_e_buku');
    Route::delete('/api/books/{id}', 'destroy')->name('aksi_h_buku');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/api/login', 'login')->name('login');
    Route::post('aksilogin', 'aksilogin')->name('aksilogin');
    Route::get('/api/register','register') ->name('register');
    Route::post('aksiregister','aksiregister') ->name('aksiregister');
});

Route::controller(LandingController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth']);;
    Route::get('/api/user', 'profil')->name('profil')->middleware(['auth']);;
    Route::post('/api/user', 'editProfil')->name('editProfil')->middleware(['auth']);;
    Route::post('/api/user/password', 'gantiPassword')->name('gantiPassword')->middleware(['auth']);;
    Route::get('/api/users', 'dataUser')->name('dataUser')->middleware(['auth']);;
    Route::get('/api/user/logout', 'logout')->name('logout');
});

Route::redirect('/', '/api/login');

