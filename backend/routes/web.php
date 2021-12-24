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

// Admin Category control
Route::get('/dashboard/category', [App\Http\Controllers\CategoryController::class, 'categoryPage'])->name('cat-page');
Route::post('/dashboard/addcat', [App\Http\Controllers\CategoryController::class, 'storeCategory'])->name('cat-store');
Route::get('/cat-status/{id}', [App\Http\Controllers\CategoryController::class, 'statusUpdate'])->name('cat.status');
Route::get('/cat-delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('cat.delete');
Route::get('/cat-edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('cat.edit');
Route::post('/cat-update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('cat.update');



//Admin Brand control
Route::get('/dashboard/brand', [App\Http\Controllers\BrandController::class, 'index'])->name('brand.index');
Route::post('/dashboard/addbrand', [App\Http\Controllers\BrandController::class, 'storeBrand'])->name('brand.store');
Route::get('/brand-status/{id}', [App\Http\Controllers\BrandController::class, 'statusUpdate'])->name('brand.status');
Route::get('/brand-edit/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand-update/{id}', [App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
Route::get('/brand-delete/{id}', [App\Http\Controllers\BrandController::class, 'destroy'])->name('brand.delete');

//Admin Tags Controller
Route::get('/dashboard/tag', [App\Http\Controllers\TagController::class, 'index'])->name('tag.index');
Route::post('/dashboard/addtag', [App\Http\Controllers\TagController::class, 'storeTag'])->name('tag.store');
Route::get('/tag-status/{id}', [App\Http\Controllers\TagController::class, 'statusUpdate'])->name('tag.status');
Route::get('/tag-delete/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.delete');
Route::get('/tag-edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::post('/tag-update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');


//Admin product control
Route::post('/dashboard/addproduct', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/dashboard/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/dashboard/product/trash', [App\Http\Controllers\ProductController::class, 'trashView'])->name('product.trashview');
Route::get('/dashboard/add-product', [App\Http\Controllers\ProductController::class, 'addNewProduct'])->name('product.add');
Route::get('/dashboard/product-trash/{id}', [App\Http\Controllers\ProductController::class, 'trash'])->name('product.trash');
Route::get('/dashboard/product-delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');




require __DIR__.'/auth.php';
