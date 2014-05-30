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

Route::any("/dev", [
    "as" => "/dev",
    "uses" => "DevController@indexAction"
]);

Route::post('add_category', 'AddCategories@add_category');

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

Route::any("also/intelMB", [
    "as" => "also/intelMB",
    "uses" => "IntelMBController@indexAction"
]);

Route::any("also/amdMB", [
    "as" => "also/amdMB",
    "uses" => "AMDMBController@indexAction"
]);

Route::any("also/serverMB", [
    "as" => "also/serverMB",
    "uses" => "ServerMBController@indexAction"
]);

Route::any("also/accMB", [
    "as" => "also/accMB",
    "uses" => "AccMBController@indexAction"
]);

Route::any("also/hdd25", [
    "as" => "also/hdd25",
    "uses" => "HDD25Controller@indexAction"
]);

Route::any("also/hdd35", [
    "as" => "also/hdd35",
    "uses" => "HDD35Controller@indexAction"
]);

Route::any("also/serverHDD", [
    "as" => "also/serverHDD",
    "uses" => "ServerHDDController@indexAction"
]);

Route::any("also/externalHDD", [
    "as" => "also/externalHDD",
    "uses" => "ExternalHDDController@indexAction"
]);

Route::any("also/accHDD", [
    "as" => "also/accHDD",
    "uses" => "AccHDDController@indexAction"
]);

Route::any("also/ssd", [
    "as" => "also/ssd",
    "uses" => "SSDController@indexAction"
]);

Route::any("also/ddrRAM", [
    "as" => "also/ddrRAM",
    "uses" => "DDRRAMController@indexAction"
]);

Route::any("also/ddr2RAM", [
    "as" => "also/ddr2RAM",
    "uses" => "DDR2RAMController@indexAction"
]);

Route::any("also/ddr3RAM", [
    "as" => "also/ddr3RAM",
    "uses" => "DDR3RAMController@indexAction"
]);

Route::any("also/dsRAM", [
    "as" => "also/dsRAM",
    "uses" => "DSRAMController@indexAction"
]);

Route::any("also/agpGPU", [
    "as" => "also/agpGPU",
    "uses" => "AGPGPUController@indexAction"
]);

Route::any("also/pciGPU", [
    "as" => "also/pciGPU",
    "uses" => "PCIGPUController@indexAction"
]);

Route::any("also/pcieGPU", [
    "as" => "also/pcieGPU",
    "uses" => "PCIEGPUController@indexAction"
]);

Route::any("also/accGPU", [
    "as" => "also/accGPU",
    "uses" => "AccGPUController@indexAction"
]);

Route::any("also/productDetails", [
    "as" => "also/productDetails",
    "uses" => "productDetailsController@indexAction"
]);