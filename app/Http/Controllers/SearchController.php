<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use DB;
use Log;
class SearchController extends Controller
{
    public function search(Request $request)
    {
      
        $enterprises=LoanApplication::where('category',$request->input('category'))
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
        

        return view('front.search')->with(['enterprises'=>$enterprises]);
    }
}