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
    //findEnterprise

    public function findEnterprise(Request $request)
    {
      
        $enterprise=LoanApplication::where('code',$request->input('current_code'))->first();

        if($enterprise){

            if($enterprise->approved){
                $amountLend = \App\Models\LenderInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
                $amountDonate = \App\Models\DonationInvoice::where('enterprise_id',$enterprise->id)->sum('amount');
                $amountInternalFunds = \App\Models\InternalFunder::where("type",$request->input('choosenType'))
                ->where('enterprise_id',$enterprise->id)->sum('fund');

                return ['status'=>true,
                 'enterprise'=>$enterprise,'amountLend'=>$amountLend?$amountLend:0,
                'amountDonate'=>$amountDonate?$amountDonate:0,
                'amountInternalFunds'=>$amountInternalFunds?$amountInternalFunds:0,
                'message'=>'Found'];
            }else{

                return ['status'=>false,'enterprise'=>$enterprise,
                'amountLend'=>null,
                'amountDonate'=>null,
                'amountInternalFunds'=>null,
                 'message'=>'Enterprise ('.$enterprise->business_name.') found, but did not approved!'];
            }
           

        }else{
            return ['status'=>false,'enterprise'=>null,'amountLend'=>null,
            'amountDonate'=>null,
            'amountInternalFunds'=>null,
            'message'=>'Enterprise could not found, try another code!'];
        }
        

        
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
