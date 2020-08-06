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
Route::post('/adm_news', 'HomeController@admin_news_add');
Route::put('/adm_news', 'HomeController@admin_news_edit');
Route::delete('/adm_news', 'HomeController@admin_news_destroy');

Route::get('/adm_news_category', 'HomeController@admin_news_category');
Route::post('/adm_news_category', 'HomeController@admin_news_category_add');
Route::put('/adm_news_category', 'HomeController@admin_news_category_edit');
Route::delete('/adm_news_category', 'HomeController@admin_news_category_destroy');

Route::get('/adm_news_img', 'HomeController@admin_news_image');
Route::post('/adm_news_img', 'HomeController@admin_news_image_add');
Route::put('/adm_news_img', 'HomeController@admin_news_image_edit');
Route::delete('/adm_news_img', 'HomeController@admin_news_image_destroy');

Route::get('/adm_customer', 'HomeController@admin_customer');
Route::get('/adm_agent', 'HomeController@admin_agent');
Route::get('/adm_bank_account', 'HomeController@admin_bank_account');
Route::get('/adm_pelayaran', 'HomeController@admin_pelayaran');
Route::get('/adm_location', 'HomeController@admin_location');
Route::get('/adm_tarif', 'HomeController@admin_tarif');
Route::get('/adm_consignee', 'HomeController@admin_consignee');
Route::get('/adm_vendor_truck', 'HomeController@admin_vendor_truck');
Route::get('/adm_trucking', 'HomeController@admin_trucking');
