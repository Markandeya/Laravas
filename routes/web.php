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

Route::group(['middleware' => ['web']], function () {

  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@single'])->where('slug', '[\w\d\-\_]+');
  Route::get('blog', 'BlogController@index');
  Route::get('/', 'PageController@index');
  Route::get('about', 'PageController@about');
  Route::get('contact', 'PageController@contact');
  Route::resource('posts', 'PostController');

});
