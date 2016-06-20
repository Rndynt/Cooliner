<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* api ROUTES */
Route::group(['prefix' => 'api'], function() {
    Route::get('/resto', 'RestoApiController@getdataResto');
    Route::get('/resto/{id}/profil', 'RestoApiController@getprofilResto');
    Route::get('/resto/{id}/menu', 'RestoApiController@getmenuResto');


    Route::get('/resto/{id}', 'RestoApiController@detailResto');
    Route::post('/resto', 'RestoApiController@saveResto');
    Route::put('/resto/{id}', 'RestoApiController@updateResto');
    Route::delete('/resto/{id}', 'RestoApiController@deleteResto');

    /* TEST USER ANDRO */
    Route::get('/pesan', 'RestoApiController@getBooking');
    Route::get('/pesan/{id}/profil', 'RestoApiController@getprofil');
    Route::get('/pesan/{id}/menu', 'RestoApiController@getmenu');
    Route::post('/pesan/booking', 'RestoApiController@postBooking');


    Route::get('/testjoni', function(){
            return view('test');
    });
    Route::post('/test', 'RestoApiController@joni');

    /* TEST ROUTE */
    Route::get('test','RestoController@test');
    Route::get('test1','RestoController@test1');
    Route::get('test2','RestoController@test2');
    Route::get('test3','RestoController@test3');
    Route::get('test4','RestoController@test4');
    Route::get('/test5','RestoController@test5');
    Route::get('/test6','RestoController@test6');
    Route::get('/test8','RestoController@test8');
});
/*---END api---*/



/* | middleware default web memeriksa session CSRF, kernel HTTP, dll | */
Route::group(['middleware' => 'web'],function(){
    Route::auth();
    Route::get('/', 'HomeController@getHome');


    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('resto','PagesController@data_resto');
        Route::get('user','PagesController@data_user');
        Route::get('resto/detail/{id}','RestoController@detail');

        Route::get('resto/form-tambah','RestoController@create');
        Route::post('resto/tambah-data','RestoController@store');

        Route::get('resto/{id}/edit', 'RestoController@edit_data_resto');
        Route::patch('resto/update/{id}', 'RestoController@update_data');
        Route::any('resto/delete/{id}', 'RestoController@destroy');
    });

    Route::group(['middleware' => ['role:admin,user']], function () {
        Route::get('/home', 'HomeController@getHome');
        //Route::get('home','PagesController@index');
        Route::get('about','PagesController@about');
        Route::get('contact','PagesController@contact');
        Route::get('dashboard','PagesController@dashboard');

    });

    Route::group(['middleware' => ['role:user']], function () {
        Route::group(['prefix' => 'manage'], function() {

                Route::get('profil/{id}', 'RestoController@profil_resto');

                Route::get('menu/{id}', 'RestoController@manage_menu');
                Route::get('{id}/new-menu', 'RestoController@new_menu');
                Route::post('{id}/post/new-menu', 'RestoController@post_new_menu');

                Route::get('pesanan/{id}', 'RestoController@manage_pesanan');
                Route::post('pesanan/update/{id}', 'RestoController@update_pesanan');
        });
    });

});


////
////Route::get('/home', 'HomeController@index');
////
////Route::auth();
////
////Route::get('/home', 'HomeController@index');
//
//Route::auth();
//
//Route::get('/home', 'HomeController@index');
