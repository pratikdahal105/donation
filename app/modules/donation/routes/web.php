<?php



Route::group(array('prefix'=>'admin/','module'=>'Donation','middleware' => ['web','auth', 'can:donations'], 'namespace' => 'App\Modules\Donation\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('donations/','AdminDonationController@index')->name('admin.donations');
    Route::post('donations/getdonationsJson','AdminDonationController@getdonationsJson')->name('admin.donations.getdatajson');
    Route::get('donations/create','AdminDonationController@create')->name('admin.donations.create');
    Route::post('donations/store','AdminDonationController@store')->name('admin.donations.store');
    Route::get('donations/show/{id}','AdminDonationController@show')->name('admin.donations.show');
    Route::get('donations/edit/{id}','AdminDonationController@edit')->name('admin.donations.edit');
    Route::match(['put', 'patch'], 'donations/update/{id}','AdminDonationController@update')->name('admin.donations.update');
    Route::get('donations/delete/{id}', 'AdminDonationController@destroy')->name('admin.donations.edit');
    Route::get('donations/getCampaignJson', 'AdminDonationController@getuserJson')->name('admin.donations.getuserjson');
});




Route::group(array('module'=>'Donation','namespace' => 'App\Modules\Donation\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('donations/','DonationController@index')->name('donations');

});
