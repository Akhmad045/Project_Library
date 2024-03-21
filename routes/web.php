<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authlogin']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register_user']);


Route::middleware('auth')->group(function () { 
    Route::get('dashboard/admin', [AdminController::class, 'dashboard_admin'])->middleware('admin');

    Route::get('dashboard/perpustakaan', [UserController::class, 'dashboard_user'])->middleware('user');
    
    // Route Kategori
    Route::get('dashboard/admin/kategori', [CategoryController::class, 'category']);
    Route::get('dashboard/admin/kategori/tambah', [CategoryController::class, 'index_category']);
    Route::post('dashboard/admin/kategori/tambah', [CategoryController::class, 'store_category']);
    Route::get('dashboard/admin/kategori/edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('dashboard/admin/kategori/edit/{slug}', [CategoryController::class, 'edit_category']);
    Route::get('dashboard/admin/kategori/delete/{slug}', [CategoryController::class, 'delete']);
    // Route Kategori

    // Route Book
    Route::get('dashboard/admin/buku',[BookController::class, 'book']);
    Route::get('dashboard/admin/buku/tambah',[BookController::class, 'add']);
    Route::post('dashboard/admin/buku/tambah',[BookController::class, 'add_book']);
    Route::get('dashboard/admin/buku/edit/{slug}',[BookController::class, 'edit']);
    Route::post('dashboard/admin/buku/edit/{slug}',[BookController::class, 'edit_book']);
    Route::get('dashboard/admin/buku/delete/{slug}',[BookController::class, 'delete_buku']);

    // Route View User-Admin
    Route::get('dashboard/admin/user',[UserController::class,'user']);

    // Route View Admin/Petugas
    Route::get('dashboard/admin/petugas', [PetugasController::class, 'index']);
    Route::get('dashboard/admin/petugas/tambah', [PetugasController::class, 'add']);
    Route::post('dashboard/admin/petugas/tambah', [PetugasController::class, 'add_petugas']);
    // Route::get('dashboard/admin/petugas', [PetugasController::class, 'index']);
    // Route::get('dashboard/admin/petugas', [PetugasController::class, 'index']);

    Route::get('logout', [AuthController::class, 'index']);
});

