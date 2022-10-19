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
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(["middleware" => "auth"], function() {
    Route::get('/top','PostsController@index');
    // Route::get('/top','PostsController@timeLine');
    Route::post('/top','PostsController@postTweet');
    // Route::get('/Timeline','TimelineController@timeLine');
    // Route::post('/Timeline','TimelineController@postTweet');

    Route::get('/logout','Auth\LoginController@logout');

    Route::get('user/{id}/profile','UsersController@profile');
    Route::post('user/{id}/profile', 'UsersController@follow')->name('profile.follow');
    Route::delete('user/{id}/profile', 'UsersController@UnFollow')->name('profile.UnFollow');
    Route::get('/editing','UsersController@editing');
    // Route::post('profile/{id}/file','UsersController@file')->name('profile.file');
    // Route::post('profile/{id}/update','UsersController@update');
    // Route::post('profile/icon','UsersController@icon');
    // Route::post('profile/{id}/icon2','UsersController@icon2');
    Route::post('/sidebar', 'UsersController@sidebar');

    // Route::post('/profile','UsersController@profile');
    Route::get('/followerList','FollowsController@followerList');
    Route::get('/followList','FollowsController@followList');
    Route::get('/followerList','FollowsController@followerList');
    // Route::get('/followList','FollowsController@followPost');

    Route::get('/search','UsersController@search')
     ->name('users.search');

    // Route::post('/followList/{id}','UsersController@followList')
    //  ->name('follows.followList');

    Route::get('/follow-list','PostsController@index');
    Route::get('/follower-list','PostsController@index');
    // Route::post('posts/index','PostsController@show');
    Route::post('post/update', 'PostsController@update')->name('posts.index');
    Route::post('editing/{id}/update','UsersController@update');
    Route::get('post/{id}/delete', 'PostsController@delete');

    // 8/11追加
    // Route::post('/search/{user}/follow', 'UsersController@follow')->name('follow');
    // Route::post('/search', 'UsersController@follow')->name('follow');
    // Route::delete('/search', 'UsersController@UnFollow')->name('UnFollow');

    // パラメータを追加
    Route::post('search/{id}', 'UsersController@follow')->name('follow');
    Route::delete('search/{id}', 'UsersController@UnFollow')->name('UnFollow');
    // Route::post('followList/{id}', 'UsersController@followList')->name('followList');

    // Route::post('followList/{id}', 'UsersController@follow')->name('follow');



});
