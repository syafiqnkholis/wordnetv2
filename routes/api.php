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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pencarian/noun', 'SearchController@searchnoun')->name('carikata');
Route::get('/noun', 'SearchController@getNoun')->name('getNoun');
Route::post('/savekb', 'NounController@simpannoun')->name('simpannoun');
Route::post('/tampilkb', 'NounController@tampilnoun')->name('tampilnoun');
Route::get('/hapuskb/{id}', 'NounController@hapusnoun')->name('hapusnoun');

Route::get('/pencarian/verb', 'SearchkkController@searchverb')->name('carikata');
Route::get('/verb', 'SearchkkController@getVerb')->name('getVerb');
Route::post('/savekk', 'VerbController@simpanverb')->name('simpanverb');
Route::post('/tampilkk', 'VerbController@tampilverb')->name('tampilverb');
Route::get('/hapuskk/{id}', 'VerbController@hapusverb')->name('hapusverb');

Route::get('/hapuskategori/{id}', 'KategoriController@delete')->name('deleteCategory');
Route::get('/editkategori/{id}', 'KategoriController@edit')->name('editCategory');
