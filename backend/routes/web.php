<?php

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//Admin Routes
Route::post('/admin/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
Route::get('/dashboard/category', [App\Http\Controllers\CategoryController::class, 'categoryPage'])->name('cat-page');
Route::post('/dashboard/addcat', [App\Http\Controllers\CategoryController::class, 'storeCategory'])->name('cat-store');
Route::get('/cat-status/{id}', [App\Http\Controllers\CategoryController::class, 'statusUpdate'])->name('cat.status');
Route::get('/cat-delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('cat.delete');
Route::get('/cat-edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('cat.edit');
Route::post('/cat-update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');

require __DIR__.'/auth.php';
