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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{user}', 'UserController@show');
Route::get('users/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('users/{user}', 'UserController@update');
Route::patch('users/{user}/password', 'UserController@update_password');
Route::patch('users/{user}/access', 'UserController@update_access');

Route::model('casestudy', 'App\CaseStudy');
Route::resource('casestudy', 'CaseStudyController');
Route::get('casestudy/{casestudy}/introduction', 'CaseStudyController@edit_introduction')->name('introduction');
