<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse($request)
    {

        \Log::info($request);
        if(isset($request->lendEnterprise))
        {
            return redirect('/lender-enterprise/?lendEnterprise='.$request->lendEnterprise);  
      
        }
        if(isset($request->donateEnterprise))
        {
            return redirect('/donate-enterprise/?donateEnterprise='.$request->donateEnterprise);   
        }
      
        if(url()->previous()){
            return redirect(url()->previous());
        }else{
            return $this->redirectTo;
        }
        
    }
}
