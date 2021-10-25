<?php



Route::group(array('prefix'=>'admin/','module'=>'Campaign','middleware' => ['web','auth', 'can:campaigns'], 'namespace' => 'App\Modules\Campaign\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('campaigns/','AdminCampaignController@index')->name('admin.campaigns');
    Route::post('campaigns/getcampaignsJson','AdminCampaignController@getcampaignsJson')->name('admin.campaigns.getdatajson');
    Route::get('campaigns/create','AdminCampaignController@create')->name('admin.campaigns.create');
    Route::post('campaigns/store','AdminCampaignController@store')->name('admin.campaigns.store');
    Route::get('campaigns/show/{id}','AdminCampaignController@show')->name('admin.campaigns.show');
    Route::get('campaigns/edit/{id}','AdminCampaignController@edit')->name('admin.campaigns.edit');
    Route::match(['put', 'patch'], 'campaigns/update/{id}','AdminCampaignController@update')->name('admin.campaigns.update');
    Route::get('campaigns/delete/{id}', 'AdminCampaignController@destroy')->name('admin.campaigns.edit');
});




Route::group(array('module'=>'Campaign','namespace' => 'App\Modules\Campaign\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('campaigns/','CampaignController@index')->name('campaigns');

});
