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

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('brand', 'BrandController');
//
//Route::post('brand/update', 'BrandController@update')->name('brand.update');
//
//Route::get('brand/destroy/{id}', 'BrandController@destroy');
//
//Route::resource('category','CatController');
//
//Route::resource('subcategories','SubcategoryController');
//
//Route::resource('products','ProductController');
////category routes starts here...

Route::get('/category-index','CategoryController@index')->name('category.index');
Route::post('/category-save','CategoryController@save')->name('category.save');
Route::get('/category-edit/{id}','CategoryController@edit')->name('category.edit');
Route::post('/category-update/{id}','CategoryController@update')->name('category.update');
Route::get('/category-delete/{id}','CategoryController@destroy')->name('category.delete');

////category routes ends here...
//
// Route::post('/add-category','CatController@store');
// Route::get('/get-subcategory','CatController@index');
//
////Category routes ends here....
//
////Subcategory route starts here.....
//
//Route::post('/add-subcategory','SubcatController@store');
//Route::get('/get-subcategory','SubcatController@index');
//
////Subcategory route ends here....
