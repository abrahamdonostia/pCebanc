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

Route::get('/', 'ArticleController@listLastArticles');

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

Route::post('user/register', [
  'as' => 'user/register',
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

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/user/profile', [
  'as' => 'user/profile',
  'uses' => 'UserController@profile'
]);


Route::post('user/updatePassword', [
  'as' => 'user/updatePassword',
  'uses' => 'UserController@updatePassword'
]);

Route::post('user/updateAvatar', [
  'as' => 'user/updateAvatar',
  'uses' => 'UserController@updateAvatar'
]);



Route::get('admin_area', ['middleware' => 'admin', function () {
  //
}]);

Route::get('user/createArticle', 'UserController@createArticle');

// Rutas Article******************************************
Route::post('article/addArticle', [
  'as' => 'addArticle',
  'uses' => 'ArticleController@addArticle'
]);

Route::get('article/{articleId}', [
  'as' => 'article',
  'uses' => 'ArticleController@showArticle'
]);
