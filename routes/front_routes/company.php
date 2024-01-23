<?php
Route::get('top-companies', 'Company\CompanyController@TopCompanies')->name('top-companies');
Route::get('don-hang', 'Company\CompanyController@resumeSearchPackages')->name('company.packages');
Route::get('unloced-seekers', 'Company\CompanyController@unlocked_users')->name('company.unloced-users');
Route::get('unlock/{user}', 'Company\CompanyController@unlock')->name('company.unlock');
Route::get('dashboard', 'Company\CompanyController@index')->name('company.home');
Route::get('companies', 'Company\CompaniesController@company_listing')->name('company.listing');
Route::get('    ', 'Company\CompaniesController@loadMoreData')->name('company.getData');
Route::get('thong-tin-ho-so', 'Company\CompanyController@companyProfile')->name('company.profile');
Route::post('update-company-profile', 'Company\CompanyController@updateCompanyProfile2')->name('update.company.profile');
Route::post('update-company-info-contact', 'Company\CompanyController@updateInfoContact')->name('update.company.contact');
Route::post('company/updatePassword', 'Company\CompanyController@updatePassword')->name('update.company.updatePassword');
Route::post('update_avatar_company', 'Company\CompanyController@updateAvatar')->name('update.company.avatar');
Route::get('quan-ly-dang-tuyen', 'Company\CompanyController@postedJobs')->name('posted.jobs');
Route::get('company/{slug}', 'Company\CompanyController@companyDetail')->name('company.detail');
Route::post('contact-company-message-send', 'Company\CompanyController@sendContactForm')->name('contact.company.message.send');
Route::post('contact-applicant-message-send', 'Company\CompanyController@sendApplicantContactForm')->name('contact.applicant.message.send');
Route::get('list-applied-users/{job_id}', 'Company\CompanyController@listAppliedUsers')->name('list.applied.users');
Route::get('list-hired-users/{job_id}', 'Company\CompanyController@listHiredUsers')->name('list.hired.users');
Route::get('list-favourite-applied-users/{job_id}', 'Company\CompanyController@listFavouriteAppliedUsers')->name('list.favourite.applied.users');
Route::get('list-interview-applied-users/{job_id}', 'Company\CompanyController@listInterviewUsers')->name('list.interview.applied.users');
Route::get('result-posted-job/{job_id}/{tabName}', 'Company\CompanyController@companyPostedResults')->name('list.result-posted-job');
Route::get('add-to-favourite-applicant/{application_id}/{user_id}/{job_id}/{company_id}', 'Company\CompanyController@addToFavouriteApplicant')->name('add.to.favourite.applicant');
Route::get('remove-from-favourite-applicant/{application_id}/{user_id}/{job_id}/{company_id}', 'Company\CompanyController@removeFromFavouriteApplicant')->name('remove.from.favourite.applicant');
Route::get('hire-from-favourite-applicant/{application_id}/{user_id}/{job_id}/{company_id}', 'Company\CompanyController@hireFromFavouriteApplicant')->name('hire.from.favourite.applicant');
Route::get('quan-ly-ung-vien', 'Company\CompanyController@applicationManager')->name('application.manager');
Route::post('detail-application', 'Company\CompanyController@detailApplication')->name('detail.application');
Route::post('update-application', 'Company\CompanyController@updateApplication')->name('application.update');
Route::get('view-public-profile-candidate/{user_id}/{job_id}', 'Company\CompanyController@viewPublicProfileCandidate')->name('application.profile.candidate');
Route::get('refresh-front-job/{job_id}', 'Company\CompaniesController@refreshFrontJob')->name('refresh.front.job');


Route::get('removed-from-hired-applicant/{application_id}/{user_id}/{job_id}/{company_id}', 'Company\CompanyController@removehireFromFavouriteApplicant')->name('remove.hire.from.favourite.applicant');
Route::get('applicant-profile/{application_id}', 'Company\CompanyController@applicantProfile')->name('applicant.profile');
Route::get('reject-applicant-profile/{application_id}', 'Company\CompanyController@rejectApplicantProfile')->name('reject.applicant.profile');
Route::get('user-profile/{id}', 'Company\CompanyController@userProfile')->name('user.profile');
Route::get('company-followers', 'Company\CompanyController@companyFollowers')->name('company.followers');
/* Route::get('company-messages', 'Company\CompanyController@companyMessages')->name('company.messages'); */
Route::post('submit-message-seeker', 'CompanyMessagesController@submitnew_message_seeker')->name('submit-message-seeker');

Route::get('company-messages', 'CompanyMessagesController@all_messages')->name('company.messages');
Route::get('append-messages', 'CompanyMessagesController@append_messages')->name('append-message');
Route::get('append-only-messages', 'CompanyMessagesController@appendonly_messages')->name('append-only-message');
Route::post('company-submit-messages', 'CompanyMessagesController@submit_message')->name('company.submit-message');
Route::get('company-message-detail/{id}', 'Company\CompanyController@companyMessageDetail')->name('company.message.detail');

Route::post('interview-schedule', 'InterviewController@store')->name('interview.schedule');
Route::get('interview-schedule', 'InterviewController@edit')->name('interview.schedule.edit');
Route::post('interview-schedule-update', 'InterviewController@update')->name('interview.schedule.update');
Route::get('len-lich-phong-van/{company_id}', 'InterviewController@getInterviewList')->name('interview.schedule.calendar');
Route::get('interview-filter', 'InterviewController@getFilter')->name('interview.filter');
Route::get('list-candidates/{job_id}', 'InterviewController@listCandidate')->name('filter.list.candidates');


Route::get('shared-cvs','Company\RecruiterSharedCVController@index')->name('shared.cvs');
Route::get('shared-cvs/{cv}/show','Company\RecruiterSharedCVController@show')->name('shared.cvs.show');
Route::put('shared-cvs/{cv}/update','Company\RecruiterSharedCVController@update')->name('shared.cvs.update');
Route::delete('shared-cvs/{cv}/delete','Company\RecruiterSharedCVController@destroy')->name('shared.cvs.delete');
Route::get('shared-cvs/{cv}/edit','Company\RecruiterSharedCVController@edit')->name('shared.cvs.edit');


