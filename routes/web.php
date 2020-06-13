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

Route::get('/fillings/{id}/documents', function ($id) {
    return view('front.documents')->with('id',$id);
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

    Route::get('/center', function () {
        return view('front.become.center');
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

Route::get('/enterprises/view/{id}', function ($id) {
    return view('front.view-enterprise')->with('id',$id);
});

Route::group(['prefix' => 'more'], function(){

    Route::get('/statement/{id}', function ($id) {
        return view('front.more.statement')->with('id',$id);
    });
    //centers
    Route::get('/lenders', function () {
        return view('front.more.lenders');
    });

    Route::get('/lender/{id}', function ($id) {
        return view('front.more.lender')->with('id',$id);
    });

    Route::get('/donors', function () {
        return view('front.more.donors');
    });
    Route::get('/donor/{id}', function ($id) {
        return view('front.more.donor')->with('id',$id);
    });
    Route::get('/managers', function () {
        return view('front.more.managers');
    });
    Route::get('/manager/{id}', function ($id) {
        return view('front.more.manager')->with('id',$id);
    });
    Route::get('/centers', function () {
        return view('front.more.centers');
    });
    Route::get('/center/{id}', function ($id) {
        return view('front.more.center')->with('id',$id);
    });

    Route::get('/stories', function () {
        return view('front.more.stories');
    });
    Route::get('/story/{id}', function ($id) {
        return view('front.more.story')->with('id',$id);
    });

    Route::get('/links/{id}', function ($id) {
        return view('front.more.link')->with('id',$id);
    });
    Route::get('/history/{id}', function ($id) {
        return view('front.more.history')->with('id',$id);
    });

    Route::get('/news', function () {
        return view('front.more.news');
    });
    Route::get('/new/{id}', function ($id) {
        return view('front.more.new')->with('id',$id);
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


Route::get('/microfund-manager-application-submitted', function () {
    return view('front.message.microfund-manager-application-submitted');
});

Route::get('/lender-submitted', function () {
    return view('front.message.lender-submitted');
});
Route::get('/donor-submitted', function () {
    return view('front.message.donor-submitted');
});

Route::get('/center-submitted', function () {
    return view('front.message.center-submitted');
});
Route::get('/loan-submitted', function () {
    return view('front.message.loan-submitted');
});

Route::get('/conference-submitted', function () {
    return view('front.message.conference-submitted');
});

Route::get('/lended-completed/{id}', function ($id) {
    return view('front.message.lended-completed')->with('id',$id);
});

Route::get('/donation-completed/{id}', function ($id) {
    return view('front.message.donation-completed')->with('id',$id);
});

Route::get('/enterprise-details/{id}', function ($id) {
    return view('layouts.enterprise-details')->with('id',$id);
});
//
//trainings-workshops-submitted
Route::get('/trainings-workshops-submitted', function () {
    return view('front.message.trainings-workshops-submitted');
});
Route::get('/partner-submitted', function () {
    return view('front.message.partner-submitted');
});

Auth::routes([ 'register' => false,'verify' => true ]);

Route::get('home', 'HomeController@index')->middleware('verified')->name('home');

Route::get('enterprises/search', 'SearchController@searchEnterprise');
Route::get('find-enterprise', 'SearchController@findEnterprise');



Route::get('fillings/search', 'SearchController@searchFillings');

Route::get('lender-enterprise', 'LenderInvoiceController@lenderEnterprise');
Route::get('donate-enterprise', 'DonationInvoiceController@donateEnterprise');



Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

Route::resource('stories', 'StoriesController');

Route::resource('news', 'NewsController');

Route::resource('teams', 'TeamsController');

Route::resource('aboutSections', 'AboutSectionsController');

Route::resource('aboutContents', 'AboutContentsController');

Route::resource('aboutUsHistories', 'AboutUsHistoryController');

Route::resource('photos', 'PhotosController');

Route::resource('contacts', 'ContactsController');

Route::resource('videosLinks', 'VideosLinksController');

Route::resource('microFundApplications', 'MicroFundApplicationController');

Route::resource('userAccounts', 'UserAccountController');

Route::get('check-microfound-user/{id}', 'UserAccountController@storeDefaultUser');

//check-microfound-user

Route::resource('loanSessions', 'LoanSessionsController');

Route::resource('loanApplications', 'LoanApplicationController');

Route::resource('lenders', 'LenderController');

Route::resource('donors', 'DonorController');

Route::resource('lenderSessions', 'LenderSessionController');

Route::resource('donorSessions', 'DonorSessionController');

Route::resource('lenderCategories', 'LenderCategoryController');

Route::resource('businessCategories', 'BusinessCategoryController');

Route::resource('enterpriseCategories', 'EnterpriseCategoryController');

Route::resource('centers', 'CenterController');

Route::resource('centerSessions', 'CenterSessionController');

Route::resource('messages', 'MessageController');

Route::resource('conferenceSessions', 'ConferenceSessionController');

Route::resource('funderManagerSessions', 'FunderManagerSessionController');

Route::resource('trainingWorkshopSessions', 'TrainingWorkshopSessionController');

Route::resource('conferenceApplications', 'ConferenceApplicationController');

Route::resource('trainingWorkshops', 'TrainingWorkshopController');

Route::resource('partenerSessions', 'PartenerSessionController');

Route::resource('partners', 'PartnerController');

Route::resource('fillingCategories', 'FillingCategoryController');

Route::resource('fillingDocuments', 'FillingDocumentController');

Route::resource('lenderInvoices', 'LenderInvoiceController');

Route::resource('donationInvoices', 'DonationInvoiceController');

Route::resource('statements', 'StatementController');

Route::resource('internalFunders', 'InternalFunderController');

Route::resource('currencies', 'CurrencyController');

Route::resource('transfers', 'TransferController');

Route::resource('periods', 'PeriodController');

Route::resource('vistors', 'VistorsController');

Route::resource('repayments', 'RepaymentController');