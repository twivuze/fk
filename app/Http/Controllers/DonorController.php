<?php

namespace App\Http\Controllers;

use App\DataTables\DonorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use App\Repositories\DonorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Http\Request;

use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;

use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;

use App\Mail\CredentialMail;

class DonorController extends AppBaseController
{
    /** @var  DonorRepository */
    private $donorRepository;

    public function __construct(DonorRepository $donorRepo)
    {
        $this->donorRepository = $donorRepo;
    }

    /**
     * Display a listing of the Donor.
     *
     * @param DonorDataTable $donorDataTable
     * @return Response
     */
    public function index(DonorDataTable $donorDataTable)
    {
        return $donorDataTable->render('donors.index');
    }

    /**
     * Show the form for creating a new Donor.
     *
     * @return Response
     */
    public function create()
    {
        return view('donors.create');
    }

    /**
     * Store a newly created Donor in storage.
     *
     * @param CreateDonorRequest $request
     *
     * @return Response
     */
    public function store(CreateDonorRequest $request)
    {
        $input = $request->all();

        $request->validate(
            ['card_number' => new CardNumber],
            ['expiration_year' => ['required', new CardExpirationYear($request->get('expiration_month'))]],
            ['expiration_month' => ['required', new CardExpirationMonth($request->get('expiration_year'))]],
            ['cvc' => ['required', new CardCvc($request->get('card_number'))] ]
        );

        if(!$request->file('donors_passport_photo')){
            $request->validate([
                'donors_passport_photo' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        }else{
            $donors_passport_photo = $this->updateImage($request,'donors_passport_photo');  
        }

        // if(!$request->file('donors_bank_details')){
        //     $request->validate([
        //         'donors_bank_details' => 'required|pdf',
        //     ]);
          
        // }else{
        // $file=$request->file('donors_bank_details');
        // $docName ='donors_bank_details-'.time().'.'.$file->extension();
        // $request->donors_bank_details->move(public_path('documents/'), $docName);
        // }

        if(!$request->file('donors_copy_of_identity_card_or_passport')){
            $request->validate([
                'donors_copy_of_identity_card_or_passport' => 'required|pdf',
            ]);
          
        }else{
        $file1=$request->file('donors_copy_of_identity_card_or_passport');
        $docName1 ='donor_id_card_or_passport-'.time().'.'.$file1->extension();
        $request->donors_copy_of_identity_card_or_passport->move(public_path('documents/'), $docName1);
        }

       

       

        $input['donors_passport_photo']=$donors_passport_photo;
        $input['donors_bank_details']='--';
        $input['donors_copy_of_identity_card_or_passport']=$docName1;

        $donor = $this->donorRepository->create($input);
        $donor->donor_code = str_pad($donor->id, 7, '0', STR_PAD_LEFT);
        $donor->save();

        Flash::success('Donor saved successfully.');

        if( isset($input['email']) ){
                Mail::to($donor->email)->send(new ApplicationSenderMail($donor,'donor'));
            }


        if(\Auth::check()){ 
            return redirect(route('donors.index'));
        }else{
            return redirect('/donor-submitted');  
        }
    }

    /**
     * Display the specified Donor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            Flash::error('Donor not found');

            return redirect(route('donors.index'));
        }

        return view('donors.show')->with('donor', $donor);
    }

    /**
     * Show the form for editing the specified Donor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            Flash::error('Donor not found');

            return redirect(route('donors.index'));
        }

        return view('donors.edit')->with('donor', $donor);
    }

    /**
     * Update the specified Donor in storage.
     *
     * @param  int              $id
     * @param UpdateDonorRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            Flash::error('Donor not found');

            return redirect(route('donors.index'));
        }
        
        $input = $request->all();

        if(\Auth::user()->type=='Donor'){ 
            $request->validate(
                ['card_number' => new CardNumber],
                ['expiration_year' => ['required', new CardExpirationYear($request->get('expiration_month'))]],
                ['expiration_month' => ['required', new CardExpirationMonth($request->get('expiration_year'))]],
                ['cvc' => ['required', new CardCvc($request->get('card_number'))] ]
            );
            }

            if($request->file('donors_passport_photo')){
                $image = $this->updateImage($request,'donors_passport_photo');  
                $input['donors_passport_photo']=$image;
            }else{
                $input['donors_passport_photo']=$donor->donors_passport_photo; 
            }
    
            if($request->file('donors_copy_of_identity_card_or_passport')){
                $file=$request->file('donors_copy_of_identity_card_or_passport');
                $docName ='donors_copy_of_identity_card_or_passport-'.time().'.'.$file->extension();
                $request->donors_copy_of_identity_card_or_passport->move(public_path('documents/'), $docName);
                $input['donors_copy_of_identity_card_or_passport']=$docName;
                }else{
                    $input['donors_copy_of_identity_card_or_passport']=$donor->donors_copy_of_identity_card_or_passport;
                }
                
                
            // if($request->file('donors_bank_details')){
            //     $file1=$request->file('donors_bank_details');
            //     $docName1 ='donors_bank_details-'.time().'.'.$file1->extension();
            //     $request->donors_bank_details->move(public_path('documents/'), $docName1);
            //     $input['donors_bank_details']=$docName1;
            //     }else{
            //         $input['donors_bank_details']=$donor->donors_bank_details;
            //     }
        

        $donor = $this->donorRepository->update($input, $id);

        Flash::success('Donor updated successfully.');

        if($donor->status=='Active'){
                      
            $user= \App\User::where('id',$donor->user_id)->where('type','Donor')->first();
                 
            if(!$user){
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
                ]);

                        $user= new \App\User();
                        $password=\Illuminate\Support\Str::random(6);

                        $user->email=$donor->email;
                        $user->name=$donor->name;
                        $user->password= \Illuminate\Support\Facades\Hash::make($password);
                        $user->type="Donor";
                        $user->status="Active";
                        $user->save();

                        $donor->user_id=$user->id;
                        $donor->save(); 

                        if( isset($donor->email) ){
                            Mail::to($donor->email)
                            ->send(new CredentialMail($donor->name,
                            $donor->email,$password,
                            'credential','MY credentials for sign in into my account'));
                        }
            }else{
                
                if(\Auth::user()->email!=$donor->email){
                    $request->validate([
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
                    ]);
                }
               
                $user->name=$donor->name;  
                $user->email=$donor->email;  
                $user->save();
            }
        }

        return redirect(route('donors.index'));
    }

    /**
     * Remove the specified Donor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $donor = $this->donorRepository->find($id);

        if (empty($donor)) {
            Flash::error('Donor not found');

            return redirect(route('donors.index'));
        }

        $this->donorRepository->delete($id);

        Flash::success('Donor deleted successfully.');

        return redirect(route('donors.index'));
    }
}
