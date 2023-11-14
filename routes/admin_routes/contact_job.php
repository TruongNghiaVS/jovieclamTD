<?php

/* * ******  Contact Job Start ********** */
Route::get('list-contact-job', array_merge(['uses' => 'Admin\ContactJobController@indexContactJob'], $all_users))->name('list.contact-job');
Route::get('list-contacts', array_merge(['uses' => 'Admin\ContactJobController@contactIndex'], $all_users))->name('list.contacts');
Route::get('edit-faq/{id}/{industry_id?}', array_merge(['uses' => 'Admin\ContactJobController@editContactJobs'], $all_users))->name('edit.contact-job');
Route::put('update-contact-job/{id}', array_merge(['uses' => 'Admin\ContactJobController@updateContactJob'], $all_users))->name('update.contact-job');
Route::get('fetch-contact-job', array_merge(['uses' => 'Admin\ContactJobController@fetchContactJobData'], $all_users))->name('fetch.data.contact-job');
Route::get('fetch-email-alert', array_merge(['uses' => 'Admin\ContactJobController@fetchEmailAlertData'], $all_users))->name('fetch.email.alert.data');
Route::get('fetch-contact-data', array_merge(['uses' => 'Admin\ContactJobController@fetchContactData'], $all_users))->name('fetch.contact.data');
Route::get('sort-contact-job', array_merge(['uses' => 'Admin\ContactJobController@sortContactJob'], $all_users))->name('sort.contact-job');
Route::get('contact-job-sort-data', array_merge(['uses' => 'Admin\ContactJobController@ContactJobSortData'], $all_users))->name('contact-job.sort.data');
Route::put('contact-job-sort-update', array_merge(['uses' => 'Admin\ContactJobController@ContactJobSortUpdate'], $all_users))->name('contact-job.sort.update');
/* * ****** End Contact Job ********** */
