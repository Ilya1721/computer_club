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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/activity', 'HomeController@event');
Route::get('/activity', 'EventController@index');
Route::get('/activity/{id}', 'EventController@show');
Route::get('/game', 'GameController@index');
Route::get('/platform', 'PlatformController@index');
Route::get('/price', 'PriceController@index');
Route::get('/schedule', 'ScheduleController@index');
Route::get('/admin/clubs/{id}/schedule/edit', 'ClubController@edit_schedule');
Route::patch('/admin/clubs/{id}/schedule', 'ClubController@update_schedule');
Route::get('/admin/clubs/{id}/price/edit', 'ClubController@edit_price');
Route::patch('/admin/clubs/{id}/price', 'ClubController@update_price');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
