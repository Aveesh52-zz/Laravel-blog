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

Auth::routes();


Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
Route::get('/home', 'HomeController@index')->name('home');   
    
Route::get('post/create', [
    'uses' => 'PostsController@create',
    'as' => 'post.create'
]);

Route::post('post/store', [
    'uses' => 'PostsController@store',
    'as' => 'post.store'
]);
Route::get('post', [
    'uses' => 'PostsController@index',
    'as' => 'posts'
]);
Route::get('post/edit/{id}', [
    'uses' => 'PostsController@edit',
    'as' => 'posts.edit'
]);
Route::get('post/kill/{id}', [
    'uses' => 'PostsController@kill',
    'as' => 'posts.kill'
]);
Route::get('post/destroy/{id}', [
    'uses' => 'PostsController@destroy',
    'as' => 'posts.destroy'
]);
Route::get('post/trashed', [
    'uses' => 'PostsController@trashed',
    'as' => 'posts.trashed'
]);
Route::get('post/restore/{id}', [
    'uses' => 'PostsController@restore',
    'as' => 'posts.restore'
]);
Route::post('post/update/{id}', [
    'uses' => 'PostsController@update',
    'as' => 'posts.update'
]);
Route::get('category/create', [
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
]);

Route::post('category/store', [
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
]);
Route::get('category', [
    'uses' => 'CategoriesController@index',
    'as' => 'category'
]);
Route::get('category/edit/{id}', [
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
]);
Route::get('category/delete/{id}', [
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.delete'
]);

Route::post('category/update/{id}', [
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
]);

Route::get('tag/create', [
    'uses' => 'TagsController@create',
    'as' => 'tags.create'
]);

Route::post('tag/store', [
    'uses' => 'TagsController@store',
    'as' => 'tags.store'
]);
Route::get('tag', [
    'uses' => 'TagsController@index',
    'as' => 'tags'
]);
Route::get('tag/edit/{id}', [
    'uses' => 'TagsController@edit',
    'as' => 'tags.edit'
]);
Route::get('tag/delete/{id}', [
    'uses' => 'TagsController@destroy',
    'as' => 'tags.delete'
]);

Route::post('tags/update/{id}', [
    'uses' => 'TagssController@update',
    'as' => 'tags.update'
]);

});
