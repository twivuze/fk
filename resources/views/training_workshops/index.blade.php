@extends('layouts.app')

@section('content')
    <section class="content-header">


        <?php if(\Request::get('session')){
       
       $session = \App\Models\TrainingWorkshopSession::where('id',\Request::get('session'))->orderBy('id','DESC')->first();
       if( $session ){
           echo'<h5 class="pull-left">'.$session->title.' <br> DateTime: '. date("d M Y",strtotime($session->event_date)) .', '.date("h:i A",strtotime($session->event_time)).'<br />
           <br />Location:'.$session->event_location.'</h5>';
       }else{
           echo'<h1 class="pull-left">Trainings & Workshops Applications</h1>'; 
       }
      
   }else{
       echo'<h1 class="pull-left">Trainings & Workshops Applications</h1>';
   }
       ?>
       
       <h1 class="pull-right">
       <?php if(\Request::get('session')){?>
          <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/trainingWorkshops">Back</a>
      <?php }
       ?>
       </h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('training_workshops.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

