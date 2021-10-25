<?php



Route::group(array('prefix'=>'admin/','module'=>'Success_story','middleware' => ['web','auth', 'can:success_stories'], 'namespace' => 'App\Modules\Success_story\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('success_stories/','AdminSuccess_storyController@index')->name('admin.success_stories');
    Route::post('success_stories/getsuccess_storiesJson','AdminSuccess_storyController@getsuccess_storiesJson')->name('admin.success_stories.getdatajson');
    Route::get('success_stories/create','AdminSuccess_storyController@create')->name('admin.success_stories.create');
    Route::post('success_stories/store','AdminSuccess_storyController@store')->name('admin.success_stories.store');
    Route::get('success_stories/show/{id}','AdminSuccess_storyController@show')->name('admin.success_stories.show');
    Route::get('success_stories/edit/{id}','AdminSuccess_storyController@edit')->name('admin.success_stories.edit');
    Route::match(['put', 'patch'], 'success_stories/update/{id}','AdminSuccess_storyController@update')->name('admin.success_stories.update');
    Route::get('success_stories/delete/{id}', 'AdminSuccess_storyController@destroy')->name('admin.success_stories.edit');
});




Route::group(array('module'=>'Success_story','namespace' => 'App\Modules\Success_story\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('success_stories/','Success_storyController@index')->name('success_stories');

});
