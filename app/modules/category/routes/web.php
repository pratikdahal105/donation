<?php



Route::group(array('prefix'=>'admin/','module'=>'Category','middleware' => ['web','auth', 'can:categories'], 'namespace' => 'App\Modules\Category\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('categories/','AdminCategoryController@index')->name('admin.categories');
    Route::post('categories/getcategoriesJson','AdminCategoryController@getcategoriesJson')->name('admin.categories.getdatajson');
    Route::get('categories/create','AdminCategoryController@create')->name('admin.categories.create');
    Route::post('categories/store','AdminCategoryController@store')->name('admin.categories.store');
    Route::get('categories/show/{id}','AdminCategoryController@show')->name('admin.categories.show');
    Route::get('categories/edit/{id}','AdminCategoryController@edit')->name('admin.categories.edit');
    Route::match(['put', 'patch'], 'categories/update/{id}','AdminCategoryController@update')->name('admin.categories.update');
    Route::get('categories/delete/{id}', 'AdminCategoryController@destroy')->name('admin.categories.edit');
});




Route::group(array('module'=>'Category','namespace' => 'App\Modules\Category\Controllers'), function() {
    //Your routes belong to this module.
    Route::get('categories/','CategoryController@index')->name('categories');

});
