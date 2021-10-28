<?php



Route::group(array('prefix'=>'admin/','module'=>'State','middleware' => ['web','auth', 'can:states'], 'namespace' => 'App\Modules\State\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('states/','AdminStateController@index')->name('admin.states');
    Route::post('states/getstatesJson','AdminStateController@getstatesJson')->name('admin.states.getdatajson');
    Route::get('states/create','AdminStateController@create')->name('admin.states.create');
    Route::post('states/store','AdminStateController@store')->name('admin.states.store');
    Route::get('states/show/{id}','AdminStateController@show')->name('admin.states.show');
    Route::get('states/edit/{id}','AdminStateController@edit')->name('admin.states.edit');
    Route::match(['put', 'patch'], 'states/update/{id}','AdminStateController@update')->name('admin.states.update');
    Route::get('states/delete/{id}', 'AdminStateController@destroy')->name('admin.states.edit');
    Route::get('states/getCountriesJson','AdminStateController@getcountriesJson')->name('admin.states.getcountriesjson');
});




Route::group(array('module'=>'State','namespace' => 'App\Modules\State\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('states/','StateController@index')->name('states');

});
