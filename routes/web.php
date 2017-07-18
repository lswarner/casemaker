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
Route::get('autosave', 'HomeController@autosave')->name('autosave');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{user}', 'UserController@show');
Route::get('users/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('users/{user}', 'UserController@update');
Route::patch('users/{user}/password', 'UserController@update_password');
Route::patch('users/{user}/access', 'UserController@update_access')->middleware('admin');


Route::model('casestudy', 'App\CaseStudy');
Route::resource('casestudy', 'CaseStudyController');
Route::patch('casestudy/{casestudy}/publish', 'CaseStudyController@publish')->name('publish')->middleware('admin');

//Route::group(['middleware' => ['team']], function () {
  Route::get('casestudy/{casestudy}/introduction', 'CaseStudyController@edit_introduction')->name('introduction');
  Route::get('casestudy/{casestudy}/methodology', 'CaseStudyController@edit_methodology')->name('methodology');
  Route::get('casestudy/{casestudy}/results', 'CaseStudyController@edit_results')->name('results');
  Route::get('casestudy/{casestudy}/implications', 'CaseStudyController@edit_implications')->name('implications');
  Route::get('casestudy/{casestudy}/review', 'CaseStudyController@review')->name('review');
  Route::patch('casestudy/{casestudy}', 'CaseStudyController@update');
  Route::patch('casestudy/{casestudy}/submit', 'CaseStudyController@submit')->name('submit');
//});


Route::group(['middleware' => 'admin'], function() {
  Route::model('method', '\App\Method');
  Route::resource('method', 'MethodController');

  Route::model('keyword', '\App\Keyword');
  Route::resource('keyword', 'KeywordController');
});
