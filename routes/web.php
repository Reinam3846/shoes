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


Route::get('/', 'ShoesController@index');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
  Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('favorites', 'UsersController@favorites')->name('users.favorites'); 
  });

Route::resource('shoes', 'ShoesController');

Route::group(['middleware'=>'auth'],function(){
  Route::group(['prefix' => 'shoes/{id}'], function () {
    Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
    Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
  });
});

Route::get('shoes/{id}', 'ShoesController@show');
Route::post('shoes', 'ShoesController@store');
Route::put('shoes/{id}', 'ShoesController@update');
Route::delete('shoes/{shoe}', 'ShoesController@destroy');
Route::get('search', 'ShoesController@search')->name('shoes.search');

});