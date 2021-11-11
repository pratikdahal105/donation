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
    Route::get('campaignRequest', 'Frontend\RequestController@requestDonation')->name('frontend.campaign.request')->middleware('auth');
    Route::get('campaignLocation', 'Frontend\RequestController@getLocation')->name('frontend.campaign.location')->middleware('auth');
    Route::post('createCampaign', 'Frontend\CampaignController@createCampaign')->name('frontend.campaign.create')->middleware('auth');
});
