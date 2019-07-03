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

Auth::routes([
    'register' => false,
]);

Route::get('/', function () {
    if (auth()->check()) return redirect()->intended(route('home'));
    return redirect()->route('login');
});

Route::middleware(['auth'])->group( function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::get('/students/create', 'StudentController@create')->name('students.create');
    Route::get('/students/{student_id}', 'StudentController@show')->name('students.show');
});
