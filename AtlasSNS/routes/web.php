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

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


// Route::get('index', 'PostsController@index');

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@register');//表示する
Route::post('/register', 'Auth\RegisterController@register');//データ送信
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(["middleware" => "auth"], function() {
    Route::get('/top','PostsController@index');
    Route::post('/top','PostsController@postTweet');

    Route::get('/logout','Auth\LoginController@logout');

    Route::get('user/{id}/profile','UsersController@profile');
    Route::get('/editing','UsersController@editing');
    Route::post('editing/{id}/update','UsersController@update');
    // Route::get('/editing', 'Auth\RegisterController@editingValidator');
    // Route::post('/editing', 'Auth\RegisterController@editingValidator');
    // Route::get('/added', 'Auth\RegisterController@added');
    // Route::post('/added', 'Auth\RegisterController@added');

    Route::post('/sidebar', 'UsersController@sidebar');

    Route::get('/followerList','FollowsController@followerList');
    Route::get('/followList','FollowsController@followList');
    Route::get('/followerList','FollowsController@followerList');

    Route::get('/search','UsersController@search')
     ->name('users.search');

    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');
    // Route::post('posts/index','PostsController@show');
    Route::post('post/update', 'PostsController@update')->name('posts.index');
    Route::get('post/{id}/delete', 'PostsController@delete');

    // パラメータを追加
    Route::post('search/{id}', 'UsersController@follow')->name('follow');
    Route::delete('search/{id}', 'UsersController@UnFollow')->name('UnFollow');




});
