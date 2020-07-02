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

Route::get('/', function () {
    return view('front.welcome');
});


Route::get('/quates', function () {
    return view('front.past-quates');
});

Route::get('/team/{id}', function ($id) {
    return view('front.team')->with('id',$id);
});

Route::get('/all-teams', function () {
    return view('front.all-teams');
});
Route::get('/team-members/{id}', function ($id) {
    return view('front.teams')->with('id',$id);
});

Route::get('/book/{id}/details', function ($id) {
    return view('front.view-book')->with('id',$id);
});
Route::get('/his-books', function () {
    return view('front.his-books');
});
Route::get('/book-frank', function () {
    return view('front.book-frank');
});
Route::get('/protofolio', function () {
    return view('front.photos');
});

Route::get('/booking-request-submitted', function () {
    return view('front.booking-request-submitted');
});
Route::get('/letter/{id}', function ($id) {
    return view('front.letter')->with('id',$id);
});

Route::get('/statement/{id}', function ($id) {
    return view('front.statement')->with('id',$id);
});
Route::get('home', 'HomeController@index')->middleware('verified')->name('home');

Auth::routes([ 'register' => true,'verify' => true ]);


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



Route::resource('statements', 'StatementController');
Route::resource('vistors', 'VistorsController');


Route::resource('quotes', 'QuotesController');

Route::resource('teams', 'TeamController');

Route::resource('teamCategories', 'TeamCategoryController');

Route::resource('books', 'BooksController');

Route::resource('bookReviews', 'BookReviewsController');

Route::resource('bookingRequests', 'BookingRequestController');

Route::resource('photos', 'PhotosController');

Route::resource('subsidiaryCompanies', 'SubsidiaryCompaniesController');

Route::resource('letters', 'LettersController');