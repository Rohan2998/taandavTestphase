<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();



Route::get('/', 'loginPageController@index')->name('adminLogin');

//Route::post('/upload', 'VideoController@store')->name('upload');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(
  ['as' => 'admin.','prefix' => 'admin', 'middleware' => ['auth', 'admin']],
  function(){
    Route::get('dashboard', 'adminDashboard@index')->name('admindashboard');

    
    
    //Uploading Art
    Route::get('uploader', 'VideoController@index')->name('uploader');
    Route::post('upload', 'VideoController@store')->name('upload');

    
    
    //Uploading Feed
    Route::get('feeduploader', 'FeedController@index')->name('feeder');
    Route::post('feedupload', 'FeedController@store')->name('feedupload');

    
    
    //Adding Admin
    Route::get('addAdmin', 'AddRemoveAdminController@add')->name('addAdmin');
    Route::post('adminadded', 'AddRemoveAdminController@store')->name('addadm');

    
    //Searching & Removing Admin
    Route::get('remAdmin', 'AddRemoveAdminController@remove')->name('remAdmin');
    Route::post('adminremoved', 'AddRemoveAdminController@showAdmin')->name('remadm');
    
    
    //Delete Admin
    Route::get('delAdmin\{id}', 'AddRemoveAdminController@destroy')->name('deletedAdmin');

    
    
    //Edit Admin
    Route::get('edAdmin\{id}', 'EditAdminController@edit')->name('editAdmin');
    Route::post('updateAdmin\{id}','EditAdminController@update')->name('updatedAdmin');

        

    //Toggle Showing users data
    Route::get('showUserList', 'ToggleUserController@index')->name('usershow');
    Route::get('editUser\{id}','ToggleUserController@edit')->name('EditUser');
    Route::post('editeduser\{id}','ToggleUserController@update')->name('editedUser');
    Route::get('deletingUser\{id}','ToggleUserController@destroy')->name('DeletingUser');
    
    
    //Approving Ads
    Route::get('showUnapprovedAds','ApproveAdsController@index')->name('ShowAds');
    Route::get('approveAd\{id}','ApproveAdsController@edit')->name('ApproveAds');
    Route::get('approvingAd\{id}','ApproveAdsController@approve')->name('ApprovingAds');
    Route::get('disapprovingAd\{id}','ApproveAdsController@disapprove')->name('DispprovingAds');

    
    //Resetting password
    Route::get('resetPage','resetPasswordController@index')->name('ResetPage');
    Route::post('submitresetPage','resetPasswordController@update')->name('SubmitResetPage');


    //Changing password
    Route::get('changeEmailPage','changeEmailController@index')->name('ChangeEmailPage');
    Route::post('submitchangeEmailPage','changeEmailController@update')->name('SubmitChangeEmailPage');

  }
);

