<?php

Route::get('job/{slug}', 'Job\JobController@jobDetail')->name('job.detail');
Route::get('job-popup/{slug}', 'Job\JobController@jobDetailPopup')->name('job.detail.popup');
Route::get('apply/{slug}', 'Job\JobController@applyJob')->name('apply.job');
#Route::post('apply/{slug}/post', 'Job\JobController@postApplyJob')->name('post.apply.job');
Route::match(['get', 'post'], 'apply/{slug}/post', 'Job\JobController@postApplyJob')->name('post.apply.job');
Route::get('jobs', 'Job\JobController@jobsBySearch')->name('job.list');
Route::get('latest-jobs', 'Job\JobController@latestJobs')->name('latest-job.list');
Route::get('add-to-favourite-job/{job_slug}', 'Job\JobController@addToFavouriteJob')->name('add.to.favourite')->middleware('auth');
Route::get('remove-from-favourite-job/{job_slug}', 'Job\JobController@removeFromFavouriteJob')->name('remove.from.favourite');
Route::get('my-job-applications', 'Job\JobController@myJobApplications')->name('my.job.applications');
Route::get('list-rejected-users/{id}', 'Company\CompanyController@listRejectedUsers')->name('rejected-users');
Route::get('my-favourite-jobs', 'Job\JobController@myFavouriteJobs')->name('my.favourite.jobs');
Route::get('tao-tin-tuyen-dung', 'Job\JobPublishController@createFrontJob')->name('post.job');
Route::post('store-front-job', 'Job\JobPublishController@storeFrontJob')->name('store.front.job');
Route::post('job/publish', 'Job\JobPublishController@publishJob')->name('store.publish.job');
Route::get('edit-front-job/{id}', 'Job\JobPublishController@editFrontJob')->name('edit.front.job');
Route::put('update-front-job/{id}', 'Job\JobPublishController@updateFrontJob')->name('update.front.job');
Route::delete('delete-front-job', 'Job\JobPublishController@deleteJob')->name('delete.front.job');
Route::get('tim-ung-vien', 'Job\JobSeekerController@jobSeekersBySearch')->name('job.seeker.list');

Route::post('submit-message', 'Job\SeekerSendController@submit_message')->name('submit-message');

Route::get('subscribe-alert', 'SubscriptionController@submitAlert')->name('subscribe.alert');


Route::get('/salary-calculation', 'Job\JobController@salaryCalc')->name('salaryCalc');
