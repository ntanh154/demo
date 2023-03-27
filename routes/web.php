<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\handleDashboardController;
use App\Http\Controllers\validateFormController;
use App\Http\Controllers\handleCategoriesController;
use App\Http\Controllers\HandleListCategories;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\AriantController;
use App\Http\Controllers\HandleHomeController;
use App\Http\Controllers\HandleProductController;


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

//product
Route::get('/admin', function (){
    return view('products\main');
})->name('main');

Route::get('/',[HandleHomeController::class,'index'])->name('home.index');


Route::get('/product', [ProductController::class,'index'])->name('product.list');
Route::get('/product/product-add', [ProductController::class,'create'])->name('product.add');
Route::post('/product/product-add',[ProductController::class, 'store'])->name('product.addData');
Route::get('/product/?page={page}', [ProductController::class,'index'])->name('product.pagination.page');


Route::get('/categories', [CategoryController::class,'index'])->name('category.list');
Route::get('/categories/add', [CategoryController::class,'create'])->name('category.create');
Route::post('/categories/add', [CategoryController::class,'store'])->name('category.add');
Route::get('/categories/?page={page}', [CategoryController::class,'index'])->name('category.pagination.page');


Route::get('/variant', [AriantController::class,'index'])->name('variant.list');
Route::get('/variant/add', [AriantController::class,'create'])->name('variant.add');
Route::post('/variant/add', [AriantController::class,'store'])->name('variant.add');


Route::get('/product-variant', [ProductVariantController::class,'index'])->name('productVariant.list');
Route::get('/product-variant/?page={page}', [ProductVariantController::class,'index'])->name('productVariant.pagination.page');
Route::get('/product-variant/add/', [ProductVariantController::class,'create'])->name('productVariant.create');
// Route::get('/product-variant/add/{id?}', [ProductVariantController::class,'create'])->name('productVariant.create');
Route::post('/product-variant/add', [ProductVariantController::class,'store'])->name('productVariant.add');
Route::get('/product-variant/edit/{id?}', [ProductVariantController::class,'edit'])->name('productVariant.edit');
Route::patch('/product-variant/update/{id?}', [ProductVariantController::class,'update'])->name('productVariant.update');




Route::get('/product-detail/{id}', [HandleProductController::class,'index'])->name('product.show_detail');
Route::get('/product-detail/{id}/{variant}/{productVariantID}', [HandleProductController::class,'index'])->name('product.show_variant');

Route::get('/*', function (){
    return view('404NotFound');
});
//dashboard
// Route::get('/', [handleDashboardController::class,'show'])->name('dashboard.getView');
// Route::get('categories/view-add',[handleCategoriesController::class,'show'])->name('dashboard.view-add');
// Route::post('categories/view-add',[handleCategoriesController::class,'store'])->name('dashboard.submit.view-add');
// Route::get('categories/list',[HandleListCategories::class,'show'])->name('dashboard.categories.list');
// Route::get('categories/list/?page={page}',[HandleListCategories::class,'store'])->name('dashboard.categories.page');
// //Redister
// Route::get('/register-user', [RegisterController::class, 'show'])->name('user.register');
// Route::post('/register-user', [RegisterController::class, 'store'])->name('user.registerPost');

// Route::get('/get/{id}', function($id){
//     return $id;
// })
// ->where('id','[0-9]+');

// Route::get('/*', function (){
//     return view('404NotFound');
// });
// Route::get('/home', [DemoController::class, 'show'])->name('home.show');
// Route::get('/gets/{id}', [DemoController::class, 'show'])->name('demo.show');
// Route::get('/post/{post}/comment/{comment}', [DemoController::class, 'create'])->name('demo.create');
// Route::get('demo/{id}',[DemoController::class, 'show'])->middleware(['demo:test'])->name('demo.url');
// // Route::post('add', [DemoController::class,'create']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('/user',[DemoController::class, 'store'])->name('login.user');

// //validate Form
// Route::get('/admin/home', [validateFormController::class, 'show'])->name('validate.form');
// Route::post('/admin/home', [validateFormController::class, 'store'])->name('validate.form');
// Route::get('edit/user',[UserController::class,'show'])->name('user.update');
// Route::post('edit/user', [UserController::class,'store'])->name('user.edit');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
