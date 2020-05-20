<?php

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


// nested categories
Route::get('/','HomeController@show');
Route::post('show/subcategory','SubCategoryController@display');
Route::post('show/childcategory','ChildCategoryController@display');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user details

Route::get('add/user','UserController@add');
Route::post('save/user','UserController@store');
// add categories

Route::get('add/category','CategoryController@add');

Route::post('/save/data','CategoryController@store');

// add sub categories

Route::get('add/subcategory','SubCategoryController@add');

Route::post('/save/subcategory','SubCategoryController@store');

// add child categories

Route::get('add/childcategory','ChildCategoryController@add');

Route::post('/save/childcategory','ChildCategoryController@store');

// add product

Route::get('add/product','ProductController@add');

Route::post('/save/product','ProductController@store');

// show product list

Route::get('show/product','ProductController@showProduct');



// add Attribute

Route::get('add/attribute','AttributeController@add');

Route::post('/save/attribute','AttributeController@store');

// add Attribute

Route::get('add/specification','SpecificationController@add');

Route::post('/save/specification','SpecificationController@store');
Route::post('/show/attribute','SpecificationController@show');