<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'JobController@index')->name('log');

Auth::routes(['verify' => true]);

Route::get('/favourites', 'HomeController@index')->name('favourite');
Route::get('/home', 'HomeController@prob')->name('home');

Route::get('/job/{id}/{job}', 'JobController@show')->name('job.show');
Route::get('/job/create', 'JobController@create')->name('job.create');
Route::post('/job/store', 'JobController@store')->name('job.store');
Route::get('/job/myjobs', 'JobController@myjobs')->name('job.myjobs');
Route::post('/job/apply/{id}', 'JobController@apply')->name('job.apply');
Route::get('/job/applicants', 'JobController@applicants')->name('applicant');
Route::get('/job/alljobs', 'JobController@alljobs')->name('alljobs');
Route::post('/applications/{id}','JobController@apply')->name('apply');

Route::get('/job/search', 'JobController@searchJob');

Route::post('/save/{id}','FavouriteController@saveJob');
Route::post('/unsave/{id}','FavouriteController@unSaveJob');

Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::post('/company/coverphoto', 'CompanyController@coverphoto')->name('company.coverphoto');
Route::post('/company/logo', 'CompanyController@logo')->name('company.logo');

Route::get('/user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('/profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('/profile/coverletter', 'UserProfileController@coverletter')->name('profile.coverletter');
Route::post('/profile/resume', 'UserProfileController@resume')->name('profile.resume');
Route::post('/profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

Route::view('employer/profile', 'auth.emp-register')->name('employer.registration');
Route::post('employer/profile/store', 'EmployerProfileController@store')->name('employer.store');

Route::get('/category/{id}', 'CategoryController@index')->name('category.index');

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('.contact');
});
