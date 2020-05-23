<?php

Route::middleware(['admin','web'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('users', 'UsersController');
    Route::resource('role', 'RoleController');
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('country/{locale}', 'LocalizationCountryController@index');

Route::middleware(['web'])->group(function () {
    Route::get('media/{file_name}', 'MediaController@getImage')->where('file_name', '.*');
    Route::get('media_avatar/{file_name}', 'MediaController@getAvatar')->where('file_name', '.*');
    Route::get('media_doc/{file_name}', 'MediaController@getFile')->where('file_name', '.*');
    Route::get('media_content/{file_name}', 'MediaController@getContentImage')->where('file_name', '.*');
    Route::post('content_image', 'MediaController@storeContentImage');
});

Route::middleware(['web'])->namespace('Index')->group(function () {
    Route::get('/', 'ChatController@index');
    Route::post('store-message', 'ChatController@store');
});

Auth::routes();
