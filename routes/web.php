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

// Route::get('/', function () {
//     return view('welcome');
// });

// Pages
Route::get('/', 'PagesControiller@welcomePage');
Route::get('/category/{category_id}/subcategories', 'PagesControiller@subcategoriesByCategoryId')->name('user.subcategory_list');
Route::get('/category/{category_id}/subcategories/{subcategory_id}/products', 'PagesControiller@productsBySubcategoryId')->name('user.products_list');
Route::get('/category/subcategories/products/{product_id}', 'PagesControiller@productDetailsById')->name('user.product_view');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['role:staff_member', 'auth', 'web'])->group(function () {
    // Categories Related Routes
    Route::resource('categories', 'CategoriesController');

    // Subcategories Related Routes
    Route::resource('subcategories', 'SubcategoriesController');
    // Products Related Routes
    Route::resource('products', 'ProductsController');
    Route::post('/product/remove', 'ProductsController@deleteProduct');
});

// Inquiry
Route::post('/inquery', 'InquiryController@inquerySubmission');
