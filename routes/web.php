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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::resource('material', 'App\Http\Controllers\Admin\MaterialController', ['except' => ['edit','show']]);

    Route::get('/material/{id}','App\Http\Controllers\Admin\MaterialController@edit');

    Route::get('/material/{id}/deletar','App\Http\Controllers\Admin\MaterialController@destroy');
    Route::get('/material/{id}/visualizar','App\Http\Controllers\Admin\MaterialController@show');

    Route::get('/clientes/{id}','App\Http\Controllers\Admin\ClienteController@edit');

    Route::get('/clientes/{id}/deletar','App\Http\Controllers\Admin\ClienteController@destroy');
    Route::get('/clientes/{id}/visualizar','App\Http\Controllers\Admin\ClienteController@show');

	Route::resource('reserva', 'App\Http\Controllers\Admin\ReservaController', ['except' => ['show','destroy']]);
    Route::get('/reserva/{id}/deletar','App\Http\Controllers\Admin\ReservaController@destroy');
    Route::get('/reserva/{id}/visualizar','App\Http\Controllers\Admin\ReservaController@show');

	Route::resource('cliente', 'App\Http\Controllers\Admin\ClienteController', ['except' => ['show','edit','destroy']]);

    Route::get('/addProduto/{id}', 'App\Http\Controllers\Admin\AddMateriaisController@index')->name('addProduto');

    Route::resource('pagamentos', App\Http\Controllers\Admin\PagamentoController::class,  ['except' => ['show','index','edit','destroy']]);

    Route::get('/addPagamento/{id}', 'App\Http\Controllers\Admin\PagamentoController@index');

    Route::get('/comprovante/{id}/visualizar', 'App\Http\Controllers\Admin\ComprovanteController@index');

});

