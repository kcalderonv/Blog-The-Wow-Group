<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth'],function () {

    Route::get('/home', 'HomeController@index')->name('menu.index');
    Route::get('/formulario/{id?}', 'HomeController@create')->name('menu.create');
    Route::post('/store', 'HomeController@store')->name('menu.store');

    /* grabar comentario */
    Route::post('/comment/store', 'CommentController@store')->name('comment.store');
});
Auth::routes();
Route::get('/', 'PageController@index')->name('index');
Route::get('/{id}', 'PageController@view')->name('view');
