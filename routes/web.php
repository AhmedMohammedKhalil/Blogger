<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});


Route::post('register','Auth\RegisterController@createUser')->name('register');
Route::post('login','Auth\LoginController@login')->name('login');
Route::post('reset-password','Auth\LoginController@changePassword')->name('reset-password');
//Auth::routes();
                 

Route::middleware(['auth'])->group(function () {
    Route::get('logout','Auth\LoginController@Logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');
    Route::post('unfollow','FollowingController@unfollow')->name('unfollow');
    Route::post('follow','FollowerController@follow')->name('follow');
    Route::get('search','SearchController@index')->name('search');
    Route::post('searching','SearchController@search')->name('searching');
    Route::post('upload','PostController@upload')->name('upload');
    Route::post('deletefiles','PostController@deleteFiles')->name('delete-files');
    Route::post('getfiles','PostController@getFiles')->name('getfiles');
    Route::post('create-post', 'PostController@store')->name('create-post');
    Route::post('comment/create','CommentController@store')->name('create-comment');
    Route::post('editcomment','CommentController@update')->name('update-comment');
    Route::post('deletecomment','CommentController@destroy')->name('delete-comment');
    Route::post('reaction','ReactionController@store')->name('reaction');
    route::post('search-post','HomeController@search')->name('search-post');
    Route::post('deletepost','PostController@destroy')->name('delete-post');
    Route::post('editpost','PostController@edit')->name('edit-post');
    Route::get('/download/{id}','MediaController@download')->name('download');


});

Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
    Route::get('profile','ProfileController@index')->name('profile');
    Route::get('settings','SettingsController@index')->name('settings');
    Route::post('settings/edit','SettingsController@edit')->name('settings.edit');
    Route::get('followers','FollowerController@index')->name('followers');
    Route::get('followings','FollowingController@index')->name('followings');

    Route::get('user','Admin\UsersController@index')->name('user.index');
    Route::get('user/delete/{id}','Admin\UsersController@destroy')->name('user.delete');

    Route::get('tags','TagController@index')->name('tags.index');
    Route::get('tags/delete/{id}','TagController@destroy')->name('tags.delete');

 /*   
    Route::get('settings','Admin\SettingsController@index')->name('settings');
/*

    Route::put('profile-update','Admin\SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','Admin\SettingsController@updatePassword')->name('password.update');

    Route::resource('post','Admin\PostController');


    Route::get('authors','Admin\AuthorController@index')->name('author.index');
    Route::delete('authors/{id}','Admin\AuthorController@destroy')->name('author.destroy');

    Route::get('comments','Admin\CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','Admin\CommentController@destroy')->name('comment.destroy');

    Route::get('/relation','Admin\RelationController@index')->name('relation.index');
    Route::post('/relation','Admin\RelationController@create')->name('relation.create');
    Route::delete('/relation/{id}','Admin\RelationController@destroy')->name('relation.destroy');

    Route::get('/follower','Admin\followerController@index')->name('follower.index');
    Route::post('/follower','Admin\followerController@create')->name('follower.create');
    Route::delete('/follower/{id}','Admin\followerController@destroy')->name('follower.destroy');
*/
   // Route::get('/following','Admin\followerController@foll')->name('follower.index');

});

Route::group(['as'=>'auther.','prefix'=>'auther','middleware'=>['auth','auther']], function (){
    Route::get('profile','ProfileController@index')->name('profile'); 
    Route::get('settings','SettingsController@index')->name('settings');
    Route::post('settings/edit','SettingsController@edit')->name('settings.edit');
    Route::get('followers','FollowerController@index')->name('followers');
    Route::get('followings','FollowingController@index')->name('followings');
/*
    Route::put('profile-update','Auther\SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','Auther\SettingsController@updatePassword')->name('password.update');

    Route::resource('post','Auther\PostController');


    Route::get('comments','Auther\CommentController@index')->name('comment.index');
    Route::delete('comments/{id}','Auther\CommentController@destroy')->name('comment.destroy');

    Route::get('/relation','Auther\RelationController@index')->name('relation.index');
    Route::post('/relation','Auther\RelationController@create')->name('relation.create');
    Route::delete('/relation/{id}','Auther\RelationController@destroy')->name('relation.destroy');

    Route::get('/follower','Auther\followerController@index')->name('follower.index');
    Route::post('/follower','Auther\followerController@create')->name('follower.create');
    Route::delete('/follower/{id}','Auther\followerController@destroy')->name('follower.destroy');

    */
});