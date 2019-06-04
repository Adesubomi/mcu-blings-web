<?php

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

Route::middleware('auth:api')->group( function () {

    Route::prefix('students')->group( function () {
        Route::get('', 'StudentController@index')->name('students.index');
        Route::get('show/{student_id}', 'StudentController@show')->name('students.show');
        Route::post('store', 'StudentController@store')->name('students.store');
    });

});
