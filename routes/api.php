<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});



Route::post('registerUser', 'Api\RegisterController@registerUser');

Route::get('listProduct', 'Api\Inventory\ProductController@listProduct');
Route::post('createProduct', 'Api\Inventory\ProductController@createProduct');
Route::post('updateProduct', 'Api\Inventory\ProductController@updateProduct');
Route::post('deleteProduct', 'Api\Inventory\ProductController@deleteProduct');
Route::get('searchProduct', 'Api\Inventory\ProductController@searchProduct');
Route::post('createProductImage', 'Api\Inventory\ProductController@createProductImage');

Route::get('listProductCategory', 'Api\Inventory\ProductCategoryController@listProductCategory');
Route::post('createProductCategory', 'Api\Inventory\ProductCategoryController@createProductCategory');
Route::post('updateProductCategory', 'Api\Inventory\ProductCategoryController@updateProductCategory');
Route::post('deleteProductCategory', 'Api\Inventory\ProductCategoryController@deleteProductCategory');

Route::get('listProductUnit', 'Api\Inventory\ProductUnitController@listProductUnit');
Route::post('createProductUnit', 'Api\Inventory\ProductUnitController@createProductUnit');
Route::post('updateProductUnit', 'Api\Inventory\ProductUnitController@updateProductUnit');
Route::post('deleteProductUnit', 'Api\Inventory\ProductUnitController@deleteProductUnit');

 
Route::post('saveSale', 'Api\Sale\SaleController@saveSale');
Route::get('list', 'Api\Sale\SaleController@list');

Route::post('logout', 'Api\Administration\LoginController@logout');
Route::get('login', 'Api\Administration\LoginController@login');
Route::get('getAllRol', 'Api\Administration\LoginController@getAllRol');
Route::get('info', 'Api\Administration\LoginController@info');








Route::get('listAlumno', 'Api\Alumno\AlumnoController@listAlumno');
Route::post('createAlumno', 'Api\Alumno\AlumnoController@createAlumno');
Route::post('updateAlumno', 'Api\Alumno\AlumnoController@updateAlumno');
Route::get('getClientWDocument', 'Api\Alumno\AlumnoController@getClientWDocument');


Route::get('listaUbigeo', 'Api\Alumno\UbigeoController@listaUbigeo');
Route::get('listaProvincia', 'Api\Alumno\UbigeoController@listaProvincia');
Route::get('listaDistrito', 'Api\Alumno\UbigeoController@listaDistrito');
Route::get('getIdUbigeo', 'Api\Alumno\UbigeoController@getIdUbigeo');
