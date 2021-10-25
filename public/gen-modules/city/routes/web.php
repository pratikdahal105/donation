<?php



Route::group(array('prefix'=>'admin/','module'=>'City','middleware' => ['web','auth', 'can:cities'], 'namespace' => 'App\Modules\City\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('cities/','AdminCityController@index')->name('admin.cities');
    Route::post('cities/getcitiesJson','AdminCityController@getcitiesJson')->name('admin.cities.getdatajson');
    Route::get('cities/create','AdminCityController@create')->name('admin.cities.create');
    Route::post('cities/store','AdminCityController@store')->name('admin.cities.store');
    Route::get('cities/show/{id}','AdminCityController@show')->name('admin.cities.show');
    Route::get('cities/edit/{id}','AdminCityController@edit')->name('admin.cities.edit');
    Route::match(['put', 'patch'], 'cities/update/{id}','AdminCityController@update')->name('admin.cities.update');
    Route::get('cities/delete/{id}', 'AdminCityController@destroy')->name('admin.cities.edit');
});




Route::group(array('module'=>'City','namespace' => 'App\Modules\City\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('cities/','CityController@index')->name('cities');

});
