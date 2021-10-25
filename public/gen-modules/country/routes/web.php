<?php



Route::group(array('prefix'=>'admin/','module'=>'Country','middleware' => ['web','auth', 'can:countries'], 'namespace' => 'App\Modules\Country\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('countries/','AdminCountryController@index')->name('admin.countries');
    Route::post('countries/getcountriesJson','AdminCountryController@getcountriesJson')->name('admin.countries.getdatajson');
    Route::get('countries/create','AdminCountryController@create')->name('admin.countries.create');
    Route::post('countries/store','AdminCountryController@store')->name('admin.countries.store');
    Route::get('countries/show/{id}','AdminCountryController@show')->name('admin.countries.show');
    Route::get('countries/edit/{id}','AdminCountryController@edit')->name('admin.countries.edit');
    Route::match(['put', 'patch'], 'countries/update/{id}','AdminCountryController@update')->name('admin.countries.update');
    Route::get('countries/delete/{id}', 'AdminCountryController@destroy')->name('admin.countries.edit');
});




Route::group(array('module'=>'Country','namespace' => 'App\Modules\Country\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('countries/','CountryController@index')->name('countries');

});
