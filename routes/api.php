<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', 'App\Http\Controllers\ProductController@index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show');
Route::post('/products', 'App\Http\Controllers\ProductController@store');
Route::put('/products/{id}', 'App\Http\Controllers\ProductController@update');
Route::delete('/products/{id}', 'App\Http\Controllers\ProductController@destroy');

Route::get('/dataPruebaCheckbox', 'App\Http\Controllers\ProductController@dataPruebaCheckbox');

Route::get('/dataPaginacion', 'App\Http\Controllers\ProductController@dataPaginacion');
Route::get('/dataPaginacion2', 'App\Http\Controllers\ProductController@dataPaginacion2');
Route::get('/dataPaginacion3', 'App\Http\Controllers\ProductController@dataPaginacion3');
Route::get('/dataPaginacion4', 'App\Http\Controllers\ProductController@dataPaginacion4');
Route::get('/dataPaginacion5', 'App\Http\Controllers\ProductController@dataPaginacion5');


Route::get('/dataPaginacionCompleta1', 'App\Http\Controllers\ProductController@dataPaginacionCompleta1');
Route::get('/dataPaginacionCompleta2', 'App\Http\Controllers\ProductController@dataPaginacionCompleta2');
Route::get('/dataPaginacionCompleta3', 'App\Http\Controllers\ProductController@dataPaginacionCompleta3');
Route::get('/dataPaginacionCompleta4', 'App\Http\Controllers\ProductController@dataPaginacionCompleta4');

