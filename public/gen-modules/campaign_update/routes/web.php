<?php



Route::group(array('prefix'=>'admin/','module'=>'Campaign_update','middleware' => ['web','auth', 'can:campaign_updates'], 'namespace' => 'App\Modules\Campaign_update\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('campaign_updates/','AdminCampaign_updateController@index')->name('admin.campaign_updates');
    Route::post('campaign_updates/getcampaign_updatesJson','AdminCampaign_updateController@getcampaign_updatesJson')->name('admin.campaign_updates.getdatajson');
    Route::get('campaign_updates/create','AdminCampaign_updateController@create')->name('admin.campaign_updates.create');
    Route::post('campaign_updates/store','AdminCampaign_updateController@store')->name('admin.campaign_updates.store');
    Route::get('campaign_updates/show/{id}','AdminCampaign_updateController@show')->name('admin.campaign_updates.show');
    Route::get('campaign_updates/edit/{id}','AdminCampaign_updateController@edit')->name('admin.campaign_updates.edit');
    Route::match(['put', 'patch'], 'campaign_updates/update/{id}','AdminCampaign_updateController@update')->name('admin.campaign_updates.update');
    Route::get('campaign_updates/delete/{id}', 'AdminCampaign_updateController@destroy')->name('admin.campaign_updates.edit');
});




Route::group(array('module'=>'Campaign_update','namespace' => 'App\Modules\Campaign_update\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('campaign_updates/','Campaign_updateController@index')->name('campaign_updates');

});
