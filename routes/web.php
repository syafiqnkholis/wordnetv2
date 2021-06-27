<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
        })->name('kbtable');
        Route::get('/kbbaru', function () {
            return view('kbbaru');
        })->name('kbbaru');
        // Route::get('/kbedit', function () {
        //     return view('kbedit');
        // });
        Route::get('/kbedit/{id}','NounController@edit')->name('kbedit');
        Route::post('/addHipernim','NounController@addHipernim');
        Route::get('/deleteHipernim/{id}','NounController@deleteHipernim');
        Route::post('/editFormProcess','NounController@editFormProcess');
        
        //route untuk kata kerja

        Route::get('/kktable', function () {
            return view('kktable');
        })->name('kktable');
        Route::get('/kkbaru', function () {
            return view('kkbaru');
        });
        Route::get('/kkedit', function () {
            return view('kkedit');
        });

        Route::get('/kbedittes/{id}','NounController@edit')->name('kbedit');
        Route::post('/addHipernim','NounController@addHipernim');
        Route::get('/deleteHipernim/{id}','NounController@deleteHipernim');
        Route::post('/editFormProcess','NounController@editFormProcess');

        // Route::get('/kategoritable', function () {
        //     return view('kategoritable');
        // })->name('kategori');

        //route untuk kategori
        Route::post('/createKategori','KategoriController@createKategori');
        Route::get('/kategoritable','KategoriController@showKategori')->name('kategori');

    });

    Route::middleware(['auth','user'])->group(function () { 
    Route::get('/halamanjarakkata', function () {
        return view('halamanjarakkata');
        });
    Route::post('/halamanjarakkata', 'NounController@jarak');
    });

    Route::get('/halamanhipernimkonten/{id}', 'NounController@display');

    Route::get('/halamanhipernimkonten', function () {
        return view('halamanhipernimkonten');
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
    // Route::get('/', 'HomeController@index')->name('home');
