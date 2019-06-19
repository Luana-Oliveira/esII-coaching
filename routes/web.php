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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderGoogleCallback');

Route::get('login/github', 'Auth\LoginController@redirectToProviderGithub');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderGithubCallback');

<<<<<<< HEAD
Route::resource('/consultations','ConsultationController');
=======
Route::get('/produtoservicos', 'ProduServiController@index')->name('produtoservicos');

Route::middleware(['auth','can:admin'])->group(function(){
    
    Route::get('/produtoservicocrud', 'ProduServiController@viewCrud')->name('produtoservicocrud');
    Route::post('/produtoservicocrud/incluir', 'ProduServiController@store')->name('produtoservicoincluir');
    Route::put('/produtoservicocrud/{id}/editar', 'ProduServiController@update')->name('produtoservicoeditar');  
    Route::delete('/produtoservicocrud/{id}', 'ProduServiController@destroy')->name('produtoservicoexcluir');
    // Route::resource('produtoservicocrud', 'ProduServiController');
  //  Route::match(['post', 'put', 'patch','delete','options'], '/', function () {
       
 //   });

  //  Route::post('/produtoservicocrud/incluir', 'ProduServiController@store')->name('produtoservicoincluir');
//    Route::put($uri, $callback);
//    Route::patch($uri, $callback);
//    Route::delete($uri, $callback);
//    Route::options($uri, $callback);

});
>>>>>>> 497e45c5bd6d255b8edf481f283ff0feeef84d94

