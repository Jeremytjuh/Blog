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

Route::get('/voorbeeld', function () {
    return 'Dit is een voorbeeld!';
});

Route::get('/json', function () {
    return ['foo' => 'bar'];
});

Route::get('/date', function () {
    return date('D');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
