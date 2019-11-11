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

Route::get('/', 'FrontendController@index')->name('homepage');

Route::namespace('Users')->group(function(){
    Route::get('login', 'LoginController@index')->name('login-form');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@index')->name('signup');
    Route::post('register', 'RegisterController@register')->name('register');
});

Route::get('books', 'BooksController@list')->name('list-books');
Route::get('book/{slug}', 'BooksController@view')->name('view-book');
Route::get('/search', 'BooksController@search')->name('search');
Route::get('categories', 'CategoriesController@list')->name('list-categories');
Route::get('category/{id}/books', 'CategoriesController@list_books')->name('category-books');
Route::get('forum', 'ThreadsController@list')->name('forum');




Route::middleware('auth')->group(function(){
    Route::get('forum/create', 'ThreadsController@create')->name('add-forum');
    Route::post('forum/create', 'ThreadsController@store')->name('store-forum');
    Route::get('add-book', 'BooksController@create')->name('add-book');
    Route::post('add-book', 'BooksController@store')->name('store-book');
    Route::get('add-category', 'CategoriesController@create')->name('add-category');
    Route::post('add-category', 'CategoriesController@store')->name('store-category');
    Route::get('category/{id}/edit', 'CategoriesController@edit')->name('edit-category');
    Route::post('category/{id}/edit', 'CategoriesController@update')->name('update-category');
    Route::get('category/{id}/delete', 'CategoriesController@delete')->name('delete-category');
    Route::post('book/{id}', 'BooksController@add_review')->name('add-review');
    Route::get('book/{id}/edit', 'BooksController@edit')->name('edit-book');
    Route::get('book/{id}/delete', 'BooksController@delete')->name('delete-book');
    Route::put('book/{id}', 'BooksController@update')->name('update-book'); 
    Route::get('forum/{id}/reply', 'ThreadsController@add_post')->name('reply-thread');
    Route::post('forum/{id}/reply', 'ThreadsController@reply')->name('store-post');
    Route::get('post/{id}/edit', 'PostsController@edit')->name('edit-post');
    Route::put('post/{id}/edit', 'PostsController@update')->name('update-post');
});

Route::get('forum/{slug}', 'ThreadsController@view')->name('view-thread');