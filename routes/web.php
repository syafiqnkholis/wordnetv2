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

        Route::get('/dashboard', function () {
            return view('dashboardadmin');
        });

        Route::get('/kbtable', function () {
            return view('kbtable');
        })->name('kbtable');
        // Route::get('/kbedit', function () {
        //     return view('kbedit');
        // });
        Route::get('/kbbaru','NounController@showNewNounForm')->name('kbbaru');
        Route::get('/kbedit/{id}','NounController@edit')->name('kbedit');
        Route::post('/addHipernim','NounController@addHipernim');
        Route::get('/deleteHipernim/{id}','NounController@deleteHipernim');
        Route::post('/editFormProcess','NounController@editFormProcess');

        Route::get('/komentarkb','KomentarController@showkomentarkb');
        Route::get('/komentarkk','KomentarController@showkomentarkk');
        
        
        

        
        //route untuk kata kerja

        Route::get('/kktable', function () {
            return view('kktable');
        })->name('kktable');
        // Route::get('/kkbaru', function () {
        //     return view('kkbaru');
        // });
        // Route::get('/kkedit', function () {
        //     return view('kkedit');
        // });
        Route::get('/kkbaru','VerbController@showNewVerbForm')->name('kkbaru');
        Route::get('/kkedit/{id}','VerbController@edit')->name('kkedit');
        Route::post('/addHipernimkk','VerbController@addHipernim');
        Route::get('/deleteHipernimkk/{id}','VerbController@deleteHipernim');
        Route::post('/editFormProcesskk','VerbController@editFormProcess');

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
    Route::post('/komentarkb/{id}','KomentarController@storekomentarkb')->name('komentarkb');
    Route::post('/komentarkk/{id}','KomentarController@storekomentarkk')->name('komentarkk');
    });

    //halaman pencarian kata benda
    Route::get('/halamanhipernim', function () {
    return view('halamanhipernim');
    });
    Route::get('/halamanhipernimkonten/{id}', 'NounController@display')->name('halamanhipernimkonten');
    // Route::get('/halamanhipernimkonten', function () {
    //     return view('halamanhipernimkonten');
    // });

    //halaman pencarian kata kerja
    Route::get('/halamanhipernimkk', function () {
        return view('halamanhipernimkk');
        });
    Route::get('/halamanhipernimkontenkk/{id}', 'verbController@display');
    Route::get('/halamanhipernimkontenkk', function () {
        return view('halamanhipernimkontenkk');
    });
    

    Route::get('/', function () {
    return view('halamanutama');
    });
    Route::get('/hipernim','SearchController@searchhipernim');
    Route::get('/hipernimkk','SearchkkController@searchhipernimsKk');
    
    Route::get('admin/api/product','InvoiceController@getAutocompleteData'); 

    Auth::routes();
    // Route::get('/', 'HomeController@index')->name('home');
