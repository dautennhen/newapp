<?php

Route::get('', array('uses' => 'HomeController@index'));
Route::group(['prefix' => 'people'], function () {
    Route::get('', array('uses' => 'PeopleController@getList'))->name('people-list');
    Route::post('', array('uses' => 'PeopleController@getList'))->name('people-list');
    Route::get('detail/{id}', array('uses' => 'PeopleController@getItem'))->name('people-detail');
    Route::get('new', array('uses' => 'PeopleController@newItem'))->name('people-new');
    Route::get('edit/{id}', array('uses' => 'PeopleController@editItem'))->name('people-edit');
    Route::post('remove/{id}', array('uses' => 'Ajax\PeopleAjaxController@remove'))->name('people-remove');
    Route::post('save/{id}', array('uses' => 'Ajax\PeopleAjaxController@save'))->name('people-save');
});

Route::group(['prefix' => 'latlong'], function () {
    Route::get('', array('uses' => 'LatlongController@getList'))->name('latlong-list');
    Route::post('', array('uses' => 'LatlongController@getList'))->name('latlong-list');
    Route::get('detail/{id}', array('uses' => 'LatlongController@getItem'))->name('latlong-detail');
    Route::get('new', array('uses' => 'LatlongController@newItem'))->name('latlong-new');
    Route::get('edit/{id}', array('uses' => 'LatlongController@editItem'))->name('latlong-edit');
    Route::post('remove/{id}', array('uses' => 'Ajax\LatlongAjaxController@remove'))->name('latlong-remove');
    Route::post('save/{id}', array('uses' => 'Ajax\LatlongAjaxController@save'))->name('latlong-save');
});

Route::get('search', array('uses' => 'SearchController@index'));
Route::post('search', array('uses' => 'SearchController@getList'))->name('latlong-result');