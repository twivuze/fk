<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use App\Models\FillingDocument;
use DB;
use Log;
class SearchController extends Controller
{
    public function searchEnterprise(Request $request)
    {
      
        $enterprises=LoanApplication::where('category',$request->input('category'))
        ->where('approved',1)
        ->orwhere('business_category_id',$request->input('business_category'))
        ->orwhere('microfinance_center',$request->input('center'))
        ->orwhere('name',$request->input('search'))
        ->orwhere('email',$request->input('search'))
        ->orwhere('address',$request->input('search'))
        ->orwhere('country',$request->input('search'))
        ->orwhere('region',$request->input('search'))
        ->orwhere('religion',$request->input('search'))
        ->orwhere('marital_status',$request->input('search'))
        ->orwhere('status',$request->input('search'))
        ->orwhere('contact',$request->input('search'))
        ->orderBy('id','DESC')->get();
        

        return view('front.search-enterprise')->with(['enterprises'=>$enterprises]);
    }

    //searchFillings

    public function searchFillings(Request $request)
    {
      
        $documents=FillingDocument::where('filling_category_id',$request->input('category'))
        ->orwhere('center_id',$request->input('center'))
        ->orwhere('name',$request->input('search'))
        ->orwhere('country',$request->input('search'))
        ->orderBy('id','DESC')->get();
        

        return view('front.search-filling')->with(['documents'=>$documents]);
    }
}
