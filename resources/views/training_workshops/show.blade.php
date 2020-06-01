@extends('layouts.app')

@section('content')
    <section class="content-header">
       
    <?php if(\Request::get('session')){
       
       $session = \App\Models\TrainingWorkshopSession::where('id',\Request::get('session'))->orderBy('id','DESC')->first();
       if( $session ){
           echo'<h5 class="pull-left">'.$session->title.' <br> DateTime: '. date("d M Y",strtotime($session->event_date)) .', '.date("h:i A",strtotime($session->event_time)).'<br />
           <br />Location:'.$session->event_location.'</h5>';
       }else{
           echo'<h1 class="pull-left">Trainings & Workshops Application</h1>'; 
       }
      
   }else{
       echo'<h1 class="pull-left">Trainings & Workshops Application</h1>';
   }
   ?>

    <?php if(\Request::get('session')){ ?>
    <a href="{{ route('trainingWorkshops.index') }}?session={{\Request::get('session')}}" class="pull-right btn btn-default">Back</a>
    <?php }else{ ?>
        <a href="{{ route('trainingWorkshops.index') }}" class="pull-right btn btn-default">Back</a>
        <?php } ?>
        <br>
        <br>
        <br>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('training_workshops.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
