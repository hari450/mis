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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function()
{
   
Route::resource('categorys', App\Http\Controllers\CategorysController::class);

Route::resource('subcategories', App\Http\Controllers\SubcategoryController::class);

Route::resource('parentcategories', App\Http\Controllers\ParentcategoryController::class);

Route::resource('childcategories', App\Http\Controllers\ChildcategoryController::class);

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('productPartNumbers', App\Http\Controllers\Product_part_numberController::class);

Route::resource('specifications', App\Http\Controllers\SpecificationController::class);

Route::resource('specificationTypes', App\Http\Controllers\Specification_typeController::class);
});



Route::get('/website', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/website/product/{childcat_id}', [App\Http\Controllers\FrontendController::class, 'product'])->name('website.product');
Route::get('/website/part/{product_id}', [App\Http\Controllers\FrontendController::class, 'part'])->name('website.part');