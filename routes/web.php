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

/* no longer redirect from / to /home */
Route::get('/', function () {
    return redirect('home');
});

Route::get('/library', 'LibraryController@index')->name('library');

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
Route::delete('users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::get('instructions', 'InstructionsController@edit')->name('instructions');
Route::patch('instructions', 'InstructionsController@update');

Route::model('casestudy', 'App\CaseStudy');
Route::group(['middleware' => ['auth']], function () {
  Route::resource('casestudy', 'CaseStudyController');
});

Route::patch('casestudy/{casestudy}/publish', 'CaseStudyController@publish')->name('publish')->middleware('admin');

Route::group(['middleware' => ['team']], function () {
  Route::get('casestudy/{casestudy}/introduction', 'CaseStudyController@edit_introduction')->name('introduction');
  Route::get('casestudy/{casestudy}/methodology', 'CaseStudyController@edit_methodology')->name('methodology');
  Route::get('casestudy/{casestudy}/results', 'CaseStudyController@edit_results')->name('results');
  Route::get('casestudy/{casestudy}/implications', 'CaseStudyController@edit_implications')->name('implications');
  Route::get('casestudy/{casestudy}/review', 'CaseStudyController@review')->name('review');
  Route::patch('casestudy/{casestudy}', 'CaseStudyController@update');
  Route::patch('casestudy/{casestudy}/submit', 'CaseStudyController@submit')->name('submit');
  Route::patch('casestudy/{casestudy}/reopen', 'CaseStudyController@reopen')->name('reopen');
  Route::patch('casestudy/{casestudy}/upload', 'CaseStudyController@upload')->name('upload');
  Route::get('casestudy/{casestudy}/attachment/{attachment}', 'CaseStudyController@attachment');
  Route::patch('casestudy/{casestudy}/team/add', 'CaseStudyController@team_add')->name('team_add');
  Route::patch('casestudy/{casestudy}/team/remove', 'CaseStudyController@team_remove')->name('team_remove');
  Route::post('casestudy/{casestudy}/invite', 'CaseStudyController@invite')->name('invite');

  Route::patch('casestudy/{casestudy}/method/add', 'CaseStudyController@method_add')->name('method_add');
  Route::patch('casestudy/{casestudy}/method/remove', 'CaseStudyController@method_remove')->name('method_remove');
  Route::patch('casestudy/{casestudy}/keyword/add', 'CaseStudyController@keyword_add')->name('keyword_add');
  Route::patch('casestudy/{casestudy}/keyword/remove', 'CaseStudyController@keyword_remove')->name('keyword_remove');
});


Route::group(['middleware' => 'admin'], function() {
  Route::model('method', '\App\Method');
  Route::resource('method', 'MethodController');

  Route::model('keyword', '\App\Keyword');
  Route::resource('keyword', 'KeywordController');

  Route::model('audience', '\App\Audience');
  Route::resource('audience', 'AudienceController');

  Route::model('thematic', '\App\Thematic');
  Route::resource('thematic', 'ThematicController');

  Route::get('cms/style', 'CMSController@style')->name('style');
  Route::patch('cms/style', 'CMSController@style_update')->name('style_update');

  Route::get('cms/image/{field}', 'CMSController@edit_image')->name('image');
  Route::post('cms/image/{field}', 'CMSController@update_image')->name('update_image');

  Route::get('cms/branding', 'CMSController@branding')->name('branding');
});
