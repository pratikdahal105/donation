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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['name' => 'Home'], function (){
    Route::get('/', 'Frontend\FrontController@index')->name('frontend.home');
    Route::get('campaignDetail\{slug}', 'Frontend\CampaignController@campaignDetail')->name('frontend.campaign.detail');
});
