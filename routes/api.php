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

Route::resource('loan_sessions', 'LoanSessionsAPIController');

Route::resource('loan_applications', 'LoanApplicationAPIController');

Route::resource('lenders', 'LenderAPIController');

Route::resource('donors', 'DonorAPIController');

Route::resource('lender_sessions', 'LenderSessionAPIController');

Route::resource('donor_sessions', 'DonorSessionAPIController');

Route::resource('lender_categories', 'LenderCategoryAPIController');

Route::resource('business_categories', 'BusinessCategoryAPIController');

Route::resource('enterprise_categories', 'EnterpriseCategoryAPIController');

Route::resource('centers', 'CenterAPIController');

Route::resource('center_sessions', 'CenterSessionAPIController');

Route::resource('messages', 'MessageAPIController');

Route::resource('conference_sessions', 'ConferenceSessionAPIController');

Route::resource('funder_manager_sessions', 'FunderManagerSessionAPIController');

Route::resource('training_workshop_sessions', 'TrainingWorkshopSessionAPIController');

Route::resource('conference_applications', 'ConferenceApplicationAPIController');

Route::resource('training_workshops', 'TrainingWorkshopAPIController');

Route::resource('partener_sessions', 'PartenerSessionAPIController');

Route::resource('partners', 'PartnerAPIController');

Route::resource('filling_categories', 'FillingCategoryAPIController');

Route::resource('filling_documents', 'FillingDocumentAPIController');

Route::resource('lender_invoices', 'LenderInvoiceAPIController');

Route::resource('donation_invoices', 'DonationInvoiceAPIController');

Route::resource('statements', 'StatementAPIController');

Route::resource('internal_funders', 'InternalFunderAPIController');

Route::resource('currencies', 'CurrencyAPIController');

Route::resource('transfers', 'TransferAPIController');

Route::resource('periods', 'PeriodAPIController');

Route::resource('vistors', 'VistorsAPIController');

Route::resource('repayments', 'RepaymentAPIController');

Route::resource('quotes', 'QuotesAPIController');

Route::resource('team_categories', 'TeamCategoryAPIController');

Route::resource('books', 'BooksAPIController');

Route::resource('book_reviews', 'BookReviewsAPIController');

Route::resource('booking_requests', 'BookingRequestAPIController');

Route::resource('subsidiary_companies', 'SubsidiaryCompaniesAPIController');

Route::resource('letters', 'LettersAPIController');

Route::resource('transactions', 'TransactionAPIController');