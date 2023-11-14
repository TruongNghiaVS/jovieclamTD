<?php

Route::get('create-ads-banner', array_merge(['uses' => 'Admin\AdBannerController@create'], $all_users))->name('create.ad-banner');
Route::post('store-ad-banner', array_merge(['uses' => 'Admin\AdBannerController@store'], $all_users))->name('store.ad-banner');
Route::get('update-ad-banner', array_merge(['uses' => 'Admin\AdBannerController@edit'], $all_users))->name('edit.ad-banner');
Route::post('update-ad-banner', array_merge(['uses' => 'Admin\AdBannerController@update'], $all_users))->name('update.ad-banner');

