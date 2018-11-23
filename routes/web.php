<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => ['sessionValid']], function () {

    Route::match(['get', 'post'], '/admin',
        [
            'as' => 'admin',
            'uses' => 'AdminController@index'
        ]
    );

    Route::get('/', function () {
        return "Ok";
    });

    Route::get('admin/dashboard/{id}', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard'
    ]);

    Route::get('admin/logout', 'AdminController@logout');

    Route::get('admin/response/{id}', [
        'as' => 'admin.response',
        'uses' => 'AdminController@response'
    ]);
});





