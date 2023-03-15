<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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
//Backend

Route::get('/admins',[AdminController::class,'index']);
Route::get('/dashboard',[SuperAdminController::class,'dashboard']);
Route::get('/logout',[SuperAdminController::class,'logout'])->name('admin.logout');
Route::post('/show_dashboard',[AdminController::class,'show'])->name('dashboard.show');


//Category

Route::resource('/categories', CategoryController::class);

Route::get('/cat_status{category}',[CategoryController::class,'category_status']);

//Sub_Category

Route::resource('/sub_categories', SubCategoryController::class);
Route::get('/subcat_status{subcategory}',[SubCategoryController::class,'category_status']);

//Brand
Route::resource('/brand', BrandController::class);
Route::get('/brand_status{brand}',[BrandController::class,'brand_status']);

//Unit

Route::resource('/units', UnitsController::class);
Route::get('/units_status{unit}',[UnitsController::class,'unit_status']);

//sizes
Route::resource('/sizes', SizesController::class);
Route::get('/sizes_status{size}',[SizesController::class,'size_status']);

//Color
Route::resource('/color', ColorController::class);
Route::get('/color_status{color}',[ColorController::class,'color_status']);

//Products
Route::resource('/products', ProductController::class);
Route::get('/products_status{product}',[ProductController::class,'Product_status']);

//Fronted
Route::get('/',[HomeController::class,'index']);
