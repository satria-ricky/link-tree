<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profil',  [UserController::class, 'tampil_profil']);

    
    Route::get('/menu',[MenuController::class,'list_menu']);
    Route::post('/tambah_ruangan', [MenuController::class, 'tambah_ruangan']);
    Route::post('/edit_ruangan', [MenuController::class, 'edit_ruangan']);
    Route::post('/hapus_ruangan', [MenuController::class, 'hapus_ruangan']);


    Route::get('/list_aset',[AsetController::class,'list_aset']);
    Route::post('/tambah_aset', [AsetController::class, 'tambah_aset']);
    Route::post('/hapus_aset', [AsetController::class, 'hapus_aset']);
    Route::get('/edit_aset/{id}', [AsetController::class, 'tampil_edit_aset']);
    Route::post('/edit_aset', [AsetController::class, 'edit_aset']);

    Route::post('/logout', [UserController::class, 'logout']);
});

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/login', [UserController::class, 'tampil_login'])->name('login');
Route::post('/login', [UserController::class, 'login']);
