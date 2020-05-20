<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('stories', 'StoriesAPIController');

Route::resource('news', 'NewsAPIController');

Route::resource('teams', 'TeamsAPIController');

Route::resource('about_sections', 'AboutSectionsAPIController');

Route::resource('about_contents', 'AboutContentsAPIController');

Route::resource('about_us_histories', 'AboutUsHistoryAPIController');

Route::resource('photos', 'PhotosAPIController');

Route::resource('contacts', 'ContactsAPIController');

Route::resource('videos_links', 'VideosLinksAPIController');

Route::resource('micro_fund_applications', 'MicroFundApplicationAPIController');

Route::resource('user_accounts', 'UserAccountAPIController');