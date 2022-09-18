<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




Route::group(['prefix' => 'v1'], function () {

    Route::get('/addProduto/{id}', 'App\Http\Controllers\API\AddMateriaisController@index');
    Route::post('/addProduto', 'App\Http\Controllers\API\AddMateriaisController@store');
    Route::get('/getProduto/{id}', 'App\Http\Controllers\API\AddMateriaisController@getMaterial');

    Route::get('/{id}/delete', 'App\Http\Controllers\API\AddMateriaisController@delMaterial');


    Route::get('/getPagamento/{id}', 'App\Http\Controllers\API\AddPagamentoController@index');
    Route::post('/addPagamento', 'App\Http\Controllers\API\AddPagamentoController@store');
    Route::get('/addPagamento/{id}/delete', 'App\Http\Controllers\API\AddPagamentoController@delPagamento');


});
