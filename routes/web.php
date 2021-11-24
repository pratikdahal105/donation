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
    Route::get('campaignCategory\{slug}', 'Frontend\CategoriesController@campaignCategory')->name('frontend.campaign.category');
    Route::get('campaignAllCategory', 'Frontend\CategoriesController@allCategory')->name('frontend.all.category');
    Route::get('campaignDiscover', 'Frontend\CategoriesController@discoverCategory')->name('frontend.all.discover');
    Route::get('campaignLoadMore', 'Frontend\CampaignController@loadMore')->name('frontend.campaign.more');
    Route::get('donationLoadMore', 'Frontend\DonationController@loadMore')->name('frontend.donation.more');
    Route::get('campaignRequest', 'Frontend\RequestController@requestDonation')->name('frontend.campaign.request')->middleware('auth');
    Route::get('campaignLocation', 'Frontend\RequestController@getLocation')->name('frontend.campaign.location')->middleware('auth');
    Route::post('createCampaign', 'Frontend\CampaignController@createCampaign')->name('frontend.campaign.create')->middleware('auth');
    Route::post('donationRequest', 'Frontend\DonationController@donationRequest')->name('frontend.donation.request')->middleware('auth');
    Route::get('makeDonation/{slug}', 'Frontend\DonationController@donate')->name('frontend.donation.form')->middleware('auth');
});

Route::group(['name' => 'Paypal'], function () {
//    Route::get('paywithpaypal/{slug}', array('as' => 'paywithpaypal', 'uses' => 'Frontend\PaypalController@payWithPaypal',));
    Route::get('paypalPost', array('as' => 'paypalPost', 'uses' => 'Frontend\PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status', 'uses' => 'Frontend\PaypalController@getPaymentStatus',));
});
