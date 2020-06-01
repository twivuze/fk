<?php

namespace App\Http\Controllers;

use App\DataTables\TrainingWorkshopDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTrainingWorkshopRequest;
use App\Http\Requests\UpdateTrainingWorkshopRequest;
use App\Repositories\TrainingWorkshopRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use App\Mail\ApplicationSenderMail;
use Illuminate\Support\Facades\Mail;

class TrainingWorkshopController extends AppBaseController
{
    /** @var  TrainingWorkshopRepository */
    private $trainingWorkshopRepository;

    public function __construct(TrainingWorkshopRepository $trainingWorkshopRepo)
    {
        $this->trainingWorkshopRepository = $trainingWorkshopRepo;
    }

    /**
     * Display a listing of the TrainingWorkshop.
     *
     * @param TrainingWorkshopDataTable $trainingWorkshopDataTable
     * @return Response
     */
    public function index(TrainingWorkshopDataTable $trainingWorkshopDataTable)
    {
        return $trainingWorkshopDataTable->render('training_workshops.index');
    }

    /**
     * Show the form for creating a new TrainingWorkshop.
     *
     * @return Response
     */
    public function create()
    {
        return view('training_workshops.create');
    }

    /**
     * Store a newly created TrainingWorkshop in storage.
     *
     * @param CreateTrainingWorkshopRequest $request
     *
     * @return Response
     */
    public function store(CreateTrainingWorkshopRequest $request)
    {
        $input = $request->all();
        
        $trainingWorkshop = $this->trainingWorkshopRepository->create($input);

        Flash::success('Training Workshop saved successfully.');

      

        if( isset($input['email']) ){
            Mail::to($trainingWorkshop->email)->send(new ApplicationSenderMail($trainingWorkshop,'trainings-workshops','Trainings & Workshops Application Submitted Successfully'));
        }

    if(\Auth::check()){ 
        return redirect(route('trainingWorkshops.index'));
    }else{
        return redirect('/trainings-workshops-submitted');  
    }
    }

    /**
     * Display the specified TrainingWorkshop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            Flash::error('Training Workshop not found');

            return redirect(route('trainingWorkshops.index'));
        }

        return view('training_workshops.show')->with('trainingWorkshop', $trainingWorkshop);
    }

    /**
     * Show the form for editing the specified TrainingWorkshop.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            Flash::error('Training Workshop not found');

            return redirect(route('trainingWorkshops.index'));
        }

        return view('training_workshops.edit')->with('trainingWorkshop', $trainingWorkshop);
    }

    /**
     * Update the specified TrainingWorkshop in storage.
     *
     * @param  int              $id
     * @param UpdateTrainingWorkshopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrainingWorkshopRequest $request)
    {
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            Flash::error('Training Workshop not found');

            return redirect(route('trainingWorkshops.index'));
        }
        $input = $request->all();

      
        $trainingWorkshop = $this->trainingWorkshopRepository->update($input, $id);

        Flash::success('Training Workshop updated successfully.');

        if(isset($request->session)){
            return redirect('trainingWorkshops?session='.$request->session);
            }else{
                return redirect(route('trainingWorkshops.index'));  
            }
    }

    /**
     * Remove the specified TrainingWorkshop from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trainingWorkshop = $this->trainingWorkshopRepository->find($id);

        if (empty($trainingWorkshop)) {
            Flash::error('Training Workshop not found');

            return redirect(route('trainingWorkshops.index'));
        }

        $this->trainingWorkshopRepository->delete($id);

        Flash::success('Training Workshop deleted successfully.');

        return redirect(route('trainingWorkshops.index'));
    }
}
