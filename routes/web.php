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

//Auth::routes(['verify' => true]);
Auth::routes();

Route::group(['name' => 'Admin','middleware' => ['web','auth', 'can:control_panel']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['name' => 'Campaign'], function (){
    Route::get('/', 'Frontend\FrontController@index')->name('frontend.home');
    Route::get('campaignDetail\{slug}', 'Frontend\CampaignController@campaignDetail')->name('frontend.campaign.detail');
    Route::get('campaignCategory\{slug}', 'Frontend\CategoriesController@campaignCategory')->name('frontend.campaign.category');
    Route::get('campaignSearch', 'Frontend\CampaignController@searchResults')->name('frontend.campaign.search');
    Route::get('SearchMore', 'Frontend\CampaignController@SearchMore')->name('frontend.search.more');
    Route::get('campaignAllCategory', 'Frontend\CategoriesController@allCategory')->name('frontend.all.category');
    Route::get('campaignDiscover', 'Frontend\CategoriesController@discoverCategory')->name('frontend.all.discover');
    Route::get('campaignLoadMore', 'Frontend\CampaignController@loadMore')->name('frontend.campaign.more');
    Route::get('campaignRequest', 'Frontend\RequestController@requestDonation')->name('frontend.campaign.request')->middleware(['auth']);
    Route::get('campaignLocation', 'Frontend\RequestController@getLocation')->name('frontend.campaign.location')->middleware(['auth']);
    Route::post('createCampaign', 'Frontend\CampaignController@createCampaign')->name('frontend.campaign.create')->middleware(['auth']);
    Route::get('campaignEdit/{slug}', 'Frontend\CampaignController@editCampaign')->name('frontend.campaign.edit');
    Route::post('campaignEdit/{slug}', 'Frontend\CampaignController@editCampaign')->name('frontend.campaign.edit');
    Route::get('deleteLogo/{slug}', 'Frontend\CampaignController@logoDelete')->name('frontend.campaign.logo.delete');

});

Route::group(['name' => 'Donation'], function (){
    Route::post('donationRequest', 'Frontend\DonationController@donationRequest')->name('frontend.donation.request')->middleware(['auth']);
    Route::get('makeDonation/{slug}', 'Frontend\DonationController@donate')->name('frontend.donation.form')->middleware(['auth']);
    Route::get('donationLoadMore', 'Frontend\DonationController@loadMore')->name('frontend.donation.more');
    Route::get('userDonation/{slug}', 'Frontend\DonationController@userDonation')->name('frontend.user.donation.edit');
    Route::post('userDonation/{slug}', 'Frontend\DonationController@userDonation')->name('frontend.user.donation.edit');
});

Route::group(['name' => 'User', 'middleware' => ['auth']], function (){
    Route::get('userProfile', 'Frontend\UserProfileController@userProfile')->name('frontend.user.profile');
    Route::post('userProfile', 'Frontend\UserProfileController@userProfile')->name('frontend.user.profile');
    Route::get('userPassword', 'Frontend\UserProfileController@userPassword')->name('frontend.user.password');
    Route::post('userPassword', 'Frontend\UserProfileController@userPassword')->name('frontend.user.password');
    Route::get('userCampaign', 'Frontend\UserProfileController@campaignUser')->name('frontend.user.campaign');
    Route::get('loadMore', 'Frontend\UserProfileController@loadMore')->name('frontend.user.load.more');
    Route::get('userDonation', 'Frontend\UserProfileController@userDonation')->name('frontend.user.donation');
    Route::get('userMoreDonation', 'Frontend\UserProfileController@moreUserDonation')->name('frontend.user.donation.more');
    Route::get('postUpdate/{slug}', 'Frontend\UserProfileController@campaignUpdate')->name('frontend.user.campaign.update');
    Route::post('postUpdate/{slug}', 'Frontend\UserProfileController@campaignUpdate')->name('frontend.user.campaign.update');
    Route::get('postUpdateEdit/{id}', 'Frontend\UserProfileController@campaignUpdateEdit')->name('frontend.user.campaign.update.edit');
    Route::post('postUpdateEdit/{id}', 'Frontend\UserProfileController@campaignUpdateEdit')->name('frontend.user.campaign.update.edit');
    Route::get('postUpdateDelete/{id}', 'Frontend\UserProfileController@campaignUpdateDelete')->name('frontend.user.campaign.update.delete');
    Route::post('campaignContactForm', 'Frontend\ContactFormController@campaignContact')->name('frontend.user.campaign.contact');
});

Route::group(['name' => 'Paypal', 'middleware' => ['auth']], function () {
    Route::get('paypalPost', array('as' => 'paypalPost', 'uses' => 'Frontend\PaypalController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'status', 'uses' => 'Frontend\PaypalController@getPaymentStatus',));
});
