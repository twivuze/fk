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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('/lend', function () {
    return view('front.lend');
});

Route::get('/donate', function () {
    return view('front.donate');
});

Route::get('/enterprises', function () {
    return view('front.enterprises');
});
Route::get('/profiles', function () {
    return view('front.profiles');
});

Route::get('/fillings', function () {
    return view('front.fillings');
});

Route::group(['prefix' => 'apply'], function(){

    Route::get('/loan', function () {
        return view('front.apply.loan');
    });

    Route::get('/yes-conferance', function () {
        return view('front.apply.yes-conferance');
    });

    Route::get('/training-workshops', function () {
        return view('front.apply.training-workshops');
    });

});


Route::group(['prefix' => 'become'], function(){

    Route::get('/ngo', function () {
        return view('front.become.ngo');
    });

    Route::get('/lender', function () {
        return view('front.become.lender');
    });

    Route::get('/donor', function () {
        return view('front.become.donor');
    });
    Route::get('/partener', function () {
        return view('front.become.partener');
    });

    Route::get('/microfund-manager', function () {
        return view('front.become.microfund-manager');
    });
});

Route::group(['prefix' => 'more'], function(){

    Route::get('/stories', function () {
        return view('front.more.stories');
    });

    Route::get('/news', function () {
        return view('front.more.news');
    });

    Route::get('/team', function () {
        return view('front.more.team');
    });
    
    Route::get('/about', function () {
        return view('front.more.about');
    });  

    Route::get('/contact', function () {
        return view('front.more.contact');
    });
    Route::get('/photos', function () {
        return view('front.more.photos');
    });

    Route::get('/video-links', function () {
        return view('front.more.video-links');
    });

});