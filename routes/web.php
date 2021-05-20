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
    return view('home');
});

Route::get('/kbbaru', function () {
    return view('kbbaru');
});

Route::get('/kbedit', function () {
    return view('kbedit');
});

Route::get('/kbtable', function () {
    return view('kbtable');
});

Route::get('/hipernim','SearchController@searchhipernim');
Route::get('admin/api/product','InvoiceController@getAutocompleteData'); 

