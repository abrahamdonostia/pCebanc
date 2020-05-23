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
Route::group(['middleware' => 'web'], function () {
  Route::auth();
});

Route::get('/', function () {
    return view('welcome');
});

/*Ruta para cambio de Idioma*/
Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      session(['locale' => $locale]);
    }
    return redirect()->back();
  });


// Rutas User******************************************

Route::get('/user/register/{error?}', [
  'as' => 'user/register',
  'uses' => 'UserController@registerForm'
]);

Route::post('api/register', [
  'as' => 'api/register',
  'uses' => 'UserController@register'
]);

Route::get('/user/loginPage', 'UserController@LoginForm');

Route::get('/user/registerSuccess', function (){
  return view('user/registerSuccess');
});



Route::post('/doLogin', [
    'as' => 'doLogin',
    'uses' => 'UserController@doLogin'
]);

Route::get('/user/profile', [
  'as' => 'user/profile',
  'uses' => 'UserController@profile'
]);

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin_area', ['middleware' => 'admin', function () {
  //
}]);
