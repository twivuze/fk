@extends('layouts.app')

@section('content')
    <section class="content-header">
    <?php if(\Request::get('session')){
       
       $session = \App\Models\ConferenceSession::where('id',\Request::get('session'))->orderBy('id','DESC')->first();
       if( $session ){
           echo'<h5 class="pull-left">'.$session->title.' <br> DateTime: '. date("d M Y",strtotime($session->event_date)) .', '.date("h:i A",strtotime($session->event_time)).'<br />
           <br />Location:'.$session->event_location.'</h5>';
       }else{
           echo'<h1 class="pull-left">Conference Application</h1>'; 
       }
      
   }else{
       echo'<h1 class="pull-left">Conference Application</h1>';
   }?>

    <?php if(\Request::get('session')){ ?>
    <a href="{{ route('conferenceApplications.index') }}?session={{\Request::get('session')}}" class="pull-right btn btn-default">Back</a>
    <?php }else{ ?>
        <a href="{{ route('conferenceApplications.index') }}" class="pull-right btn btn-default">Back</a>
        <?php } ?>
        <br>
        <br>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('conference_applications.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
