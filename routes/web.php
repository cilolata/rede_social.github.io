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

Route::get('/aboutus', function () {
    return view('aboutus');
});

//Index
Route::get('/index', function () {
    return view('index');
});

Route::get('/contact', 'ContactController@contact');

Auth::routes();

Route::middleware(['auth'])->group(function(){

    //Home usuário logado
    Route::get('/home', function () {
        return view('home');
    });

    // listando todos eventos
    Route::get('/events', 'EventsController@index');

    // listando evento específico a partir do ID - no futuro alterar para event/{id} para 
    // capturar as infos do evento
    Route::get('/event', 'EventsController@search');

    Route::get('/profile/{id}', 'ProfileController@profile');

});
