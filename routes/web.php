<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@admin_index')->name('home')->middleware('verified');

//Route to admin pages
Route::get('/adm_tracking', 'HomeController@admin_tracking');
Route::get('/adm_news', 'HomeController@admin_news');
Route::get('/adm_news_category', 'HomeController@admin_news_category');
Route::get('/adm_news_img', 'HomeController@admin_news_image');
