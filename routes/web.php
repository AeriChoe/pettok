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

Route::get('/', 'PostController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//githubログイン
Route::get('login/github', 'Auth\LoginController@githubRedirectTo')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@githubProviderCallback');


Route::group(['middleware' => ['auth']], function () {
    
    //USER
    Route::resource('users', 'UserController', ['only' => 'show']);
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });
    
    Route::resource('profile', 'ProfileController', ['only' => ['index', 'edit', 'update']]);
    
    //POST
    Route::resource('posts', 'PostController', ['only' => ['create', 'store']]);
    
    Route::group(['prefix' => 'post/{id}'], function () {
        Route::get('/', 'PostController@show')->name('post.show');
        Route::post('like', 'LikeController@store')->name('like');
        Route::delete('unlike', 'LikeController@destroy')->name('unlike');
        Route::delete('post.delete', 'PostController@destroy')->name('post.delete');
        Route::post('comment', 'CommentController@store')->name('comment');
        Route::delete('comment.delete', 'CommentController@destroy')->name('comment.delete');
    });
    
    Route::get('category/{category}', 'PostController@showcollection')->name('posts.show');
    Route::post('search', 'PostController@search')->name('search');
    
});
