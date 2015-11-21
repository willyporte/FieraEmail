<?php

Route::get('/', ['as' => 'tickets.index', "uses" => 'TicketController@index']);
Route::post('/', ['as' => 'tickets.store', "uses" => 'TicketController@store']);

Route::group(
    ['prefix' => 'admin', 'middleware' => 'auth'],
    function () {
        Route::get(
            'tickets',
            [
                'as' => 'admin.tickets',
                'uses' => 'AdminTicketController@index',
            ]
        );
        Route::get(
            'excel',
            [
                'as' => 'admin.excel.index',
                'uses' => 'ExcelController@index',
            ]
        );
        Route::get(
            'parametri',
            [
                'as' => 'admin.parametri.index',
                'uses' => 'AdminParametriController@index',
            ]
        );
        Route::post(
            'parametri/{id}',
            [
                'as' => 'admin.parametri.update',
                'uses' => 'AdminParametriController@update',
            ]
        );
        Route::get('image/{img}',
            [
                'as' => 'admin.image',
                'uses' => 'AdminTicketController@image',
            ]
        );
    }
);

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
