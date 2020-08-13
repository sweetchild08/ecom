<?php

use Illuminate\Support\Facades\Route;
use App\Items;

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
//REDIRECXT
Route::get('/', function () {
    return redirect('home');
});
Route::get('/admin', function () {
    return redirect(route('admin.home'));
});

Route::get('admin/test/{items}', function(){
    return view('admin.test');
});
Auth::routes();
//admin
Route::get('admin/home', 'AdminController@index')->name('admin.home');
//items
Route::get('admin/home/items', 'ItemsController@create')->name('admin.item');
Route::post('admin/home/addingitem', 'ItemsController@store')->name('admin.storeitem');
Route::delete('admin/item/{items}/delete', 'ItemsController@delete');
Route::get('admin/item/{items}/edit', 'ItemsController@edit');

//itempics
Route::post('admin/item/{items}/addpicture', 'ItempicsController@store');
Route::get('admin/item/{items}/pics', 'ItempicsController@show');
Route::delete('admin/itempics/{itempics}/delete', 'ItempicsController@delete');
Route::patch('admin/itempics/{itempics}/setas', 'ItempicsController@edit');
//STOCK
Route::get('admin/item/{items}/stocks', 'StocksController@show');
Route::post('admin/item/{items}/addstock', 'StocksController@store');
Route::delete('admin/stock/{stocks}/delete', 'StocksController@delete');
Route::delete('admin/itempics/{itempics}/delete', 'ItempicsController@delete');
Route::patch('admin/itempics/{itempics}/setas', 'ItempicsController@edit');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'PizzaController@create')->name('order');
Route::get('/index', 'PizzaController@index')->name('index')->middleware('auth');
Route::post('/store', 'PizzaController@store')->name('create');
Route::get('/pizza/{id}/edit', 'PizzaController@edit')->name('pizza.edit');
Route::patch('/pizza/{pizza}', 'PizzaController@update')->name('pizza.update');

