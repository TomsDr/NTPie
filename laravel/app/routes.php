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

Route::any("/", [
    "as" => "index/index",
    "uses" => "IndexController@indexAction"
]);

Route::any("category/index", [
    "as" => "category/index",
    "uses" => "CategoryController@indexAction"
]);

Route::any("product/index", [
    "as" => "product/index",
    "uses" => "ProductController@indexAction"
]);

Route::any("account/authenticate", [
    "as" => "account/authenticate",
    "uses" => "AccountController@authenticateAction"
]);

Route::any("order/index", [
    "as" => "order/index",
    "uses" => "OrderController@indexAction"
]);

Route::any("also/index", [
    "as" => "also/index",
    "uses" => "AlsoController@indexAction"
]);

Route::any("gntxml/index", [
    "as" => "gntxml/index",
    "uses" => "GntXmlController@indexAction"
]);