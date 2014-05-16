<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::any("category/index", [
    "as" => "category/index",
    "uses" => "CategoryController@indexAction"
]);

Route::any("product/index", [
    "as" => "product/index",
    "uses" => "ProductController@indexAction"
]);