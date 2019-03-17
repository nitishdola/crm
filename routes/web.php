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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'agent'], function () {
  Route::get('/login', 'AgentAuth\LoginController@showLoginForm')->name('agent.login');
  Route::post('/login', 'AgentAuth\LoginController@login');
  //Route::post('/logout', 'AgentAuth\LoginController@logout')->name('agent.logout');
  Route::get('/logout', 'AgentAuth\LoginController@logout')->name('agent.logout');

  Route::get('/register', 'AgentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AgentAuth\RegisterController@register');

  Route::post('/password/email', 'AgentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AgentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AgentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AgentAuth\ResetPasswordController@showResetForm');
});


Route::post('/update-status', [
    'as' => 'update.status',
    'uses' => 'BaseController@updateStatus'
]);


Route::post('/set-appointment', [
    'as' => 'set.appointment',
    'uses' => 'BaseController@setAppointment'
]);
