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

Route::get('/', function () {
    return view('welcome');
});
//Route::view('mascotas','mascotas');
//Route::get('mascotas', function () {
 //   return view('mascotas');
//});
Route::apiResource('apiEs','EspecieController');
Route::apiResource('apiMas','MascotaController');
Route::apiResource('apiPro','PropietariosController');
Route::apiResource('apiRaza','RazasController');
Route::apiResource('apiProducto','ProductoController');
Route::get('mascota', function () {
    return view('mascota');
});
Route::get('pro', function () {
    return view('propietarios');
});
Route::get('espe', function () {
    return view('especies');
});
Route::get('raza', function () {
    return view('raza');
});
Route::get('mascotas', function () {
    return view('mascotas');
});
Route::get('especie', function () {
    return view('especiescrud');
});
Route::get('propie', function () {
    return view('propietarioscrud');
});
Route::get('razas', function () {
    return view('razascrud');
});
Route::get('productos',function(){
	return view('productos');
});
