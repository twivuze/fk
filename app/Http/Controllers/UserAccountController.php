<?php

namespace App\Http\Controllers;

use App\DataTables\UserAccountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserAccountRequest;
use App\Http\Requests\UpdateUserAccountRequest;
use App\Repositories\UserAccountRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserAccount;
use Illuminate\Support\Facades\Mail;

class UserAccountController extends AppBaseController
{
    /** @var  UserAccountRepository */
    private $userAccountRepository;

    public function __construct(UserAccountRepository $userAccountRepo)
    {
        $this->userAccountRepository = $userAccountRepo;
    }

    /**
     * Display a listing of the UserAccount.
     *
     * @param UserAccountDataTable $userAccountDataTable
     * @return Response
     */
    public function index(UserAccountDataTable $userAccountDataTable)
    {
        return $userAccountDataTable->render('user_accounts.index');
    }

    /**
     * Show the form for creating a new UserAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_accounts.create');
    }

    /**
     * Store a newly created UserAccount in storage.
     *
     * @param CreateUserAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAccountRequest $request)
    {
        $input = $request->all();

        $userAccount = $this->userAccountRepository->create($input);

        Flash::success('User Account saved successfully.');

        return redirect(route('userAccounts.index'));
    }

    public function storeDefaultUser($id)
    {
        $application=\App\Models\MicroFundApplication::find($id);

        if( $application){

            $user= \App\User::find($application->user_id);
                    
                    if($user){
                        return redirect('/userAccounts/'.$user->id.'/edit');
                    }else{

                        $user= new \App\User();
                        
                        $user->email=$application->email;
                        $user->name=$application->full_name;
                        $user->password= \Illuminate\Support\Facades\Hash::make('12345');
                        $user->type="MicroFoundManager";
                        $user->status="Inactive";
                        $user->save();

                        $application->user_id=$user->id;
                        $application->save();

                        return redirect('/userAccounts/'.$user->id.'/edit');
                    }

        }else{
            return redirect(route('userAccounts.index'));
        }
      


      
    }

    /**
     * Display the specified UserAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        return view('user_accounts.show')->with('userAccount', $userAccount);
    }

    /**
     * Show the form for editing the specified UserAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        return view('user_accounts.edit')->with('userAccount', $userAccount);
    }

    /**
     * Update the specified UserAccount in storage.
     *
     * @param  int              $id
     * @param UpdateUserAccountRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $userAccount = $this->userAccountRepository->find($id);


        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }
        $input= $request->all();
        $newPassword=$request->password;
        if ($newPassword){
            $input['password']= Hash::make($newPassword);
        }

     

         $userAccount = $this->userAccountRepository->update($input, $id);
         if ($newPassword){
            Mail::to($request->email)->send(new UserAccount($request->email,$newPassword));
         }
        Flash::success('User Account updated successfully.');

        return redirect(route('userAccounts.index'));
    }

    /**
     * Remove the specified UserAccount from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userAccount = $this->userAccountRepository->find($id);

        if (empty($userAccount)) {
            Flash::error('User Account not found');

            return redirect(route('userAccounts.index'));
        }

        $this->userAccountRepository->delete($id);

        Flash::success('User Account deleted successfully.');

        return redirect(route('userAccounts.index'));
    }
}
