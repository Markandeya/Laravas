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
  //Authentication
//  Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
//  Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
//  Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

  //Registration
  Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
  Route::post('auth/register', 'Auth\RegisterController@register');

  //Password resets routes
  //show page to type in new password and submit
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');
  //show page to type in email and send email
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

  //Static blog pages
  Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@single'])->where('slug', '[\w\d\-\_]+');
  Route::get('blog', 'BlogController@index');
  Route::get('/', 'PageController@index');
  Route::get('about', 'PageController@about');
  Route::get('contact', 'PageController@getContact');
  Route::post('contact', 'PageController@postContact');


  // Posts and Categories protected by middleware auth
  Route::resource('posts', 'PostController');
  Route::resource('categories', 'CategoryController', ['except' => ['create']]);
  Route::resource('tags', 'TagController', ['except' => ['create']]);

  //Comments
  Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
  Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
  Route::patch('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
  Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
  Route::delete('comments/{id}/delete', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

  //temporary hack to overcome default /login and /home route on unauthorized access
  Route::get('/login', 'Auth\LoginController@showLoginForm');
  Route::get('/home', 'PageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
