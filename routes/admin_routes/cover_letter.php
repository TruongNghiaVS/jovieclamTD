<?php

/* * ******  CoverLetter Start ********** */
Route::get('list-cover-letter-details', array_merge(['uses' => 'Admin\CoverLetterController@indexCoverLetters'], $all_users))->name('list.cover-letter.details');
Route::get('create-cover-letter-detail', array_merge(['uses' => 'Admin\CoverLetterController@createCoverLetter'], $all_users))->name('create.cover-letter.detail');
Route::post('store-cover-letter-detail', array_merge(['uses' => 'Admin\CoverLetterController@storeCoverLetter'], $all_users))->name('store.cover-letter.detail');
Route::get('edit-cover-letter-detail/{id}', array_merge(['uses' => 'Admin\CoverLetterController@editCoverLetter'], $all_users))->name('edit.cover-letter.detail');
Route::put('update-cover-letter-detail/{id}', array_merge(['uses' => 'Admin\CoverLetterController@updateCoverLetter'], $all_users))->name('update.cover-letter.detail');
Route::delete('delete-cover-letter-detail', array_merge(['uses' => 'Admin\CoverLetterController@deleteCoverLetter'], $all_users))->name('delete.cover-letter.detail');
Route::get('fetch-cover-letter.details', array_merge(['uses' => 'Admin\CoverLetterController@fetchCoverLettersData'], $all_users))->name('fetch.data.cover-letter.details');
Route::put('make-active-cover-letter-detail', array_merge(['uses' => 'Admin\CoverLetterController@makeActiveCoverLetter'], $all_users))->name('make.active.cover-letter.detail');
Route::put('make-not-active-cover-letter-detail', array_merge(['uses' => 'Admin\CoverLetterController@makeNotActiveCoverLetter'], $all_users))->name('make.not.active.cover-letter.detail');
Route::get('sort-cover-letter-details', array_merge(['uses' => 'Admin\CoverLetterController@sortCoverLetters'], $all_users))->name('sort.cover-letter.details');
Route::get('cover-letter-detail-sort-data', array_merge(['uses' => 'Admin\CoverLetterController@CoverLetterSortData'], $all_users))->name('cover-letter.detail.sort.data');
Route::put('cover-letter-detail-sort-update', array_merge(['uses' => 'Admin\CoverLetterController@CoverLetterSortUpdate'], $all_users))->name('cover-letter.detail.sort.update');
/* * ****** End CoverLetter ********** */
