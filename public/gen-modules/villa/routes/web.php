<?php



Route::group(array('prefix'=>'admin/','module'=>'Villa','middleware' => ['web','auth','AclMiddleware'], 'permission' => 'villas', 'namespace' => 'App\Modules\Villa\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('villas/','AdminVillaController@index')->name('admin.villas');
    Route::post('villas/getvillasJson','AdminVillaController@getvillasJson')->name('admin.villas.getdatajson');
    Route::get('villas/create','AdminVillaController@create')->name('admin.villas.create');
    Route::post('villas/store','AdminVillaController@store')->name('admin.villas.store');
    Route::get('villas/show/{id}','AdminVillaController@show')->name('admin.villas.show');
    Route::get('villas/edit/{id}','AdminVillaController@edit')->name('admin.villas.edit');
    Route::match(['put', 'patch'], 'villas/update/{id}','AdminVillaController@update')->name('admin.villas.update');
    Route::get('villas/delete/{id}', 'AdminVillaController@destroy')->name('admin.villas.edit');
});




Route::group(array('module'=>'Villa','namespace' => 'App\Modules\Villa\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('villas/','VillaController@index')->name('villas');
    
});