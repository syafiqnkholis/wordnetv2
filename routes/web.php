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
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/kbtable', function () {
        return view('kbtable');
    });

    Route::get('/kbbaru', function () {
        return view('kbbaru');
    });

    Route::get('/kbedit', function () {
        return view('kbedit');
    });

});

Route::middleware(['auth','user'])->group(function () {
    Route::get('/halamanhipernimkonten', function () {
        return view('halamanhipernimkonten');
    });

    Route::get('/halamanjarakkata', function () {
        return view('halamanjarakkata');
    });

});

Route::get('/', function () {
    return view('halamanutama');
});

Route::get('/halamanhipernim', function () {
    return view('halamanhipernim');
});



Route::get('/hipernim','SearchController@searchhipernim');
Route::get('admin/api/product','InvoiceController@getAutocompleteData'); 

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
