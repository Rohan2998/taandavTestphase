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

    //Removing Admin
    Route::get('remAdmin', 'AddRemoveAdminController@remove')->name('remAdmin');
    Route::post('adminremoved', 'AddRemoveAdminController@showAdmin')->name('remadm');

    //Toggle Showing users data
    Route::get('showUserList', 'ToggleUserController@index')->name('usershow');
    Route::post('adminremoved', 'ToggleUserController@showAdmin')->name('remadm');


    
  }
);

