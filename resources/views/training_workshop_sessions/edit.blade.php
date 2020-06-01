@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Training Workshop Session
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($trainingWorkshopSession, ['route' =>
                    ['trainingWorkshopSessions.update', $trainingWorkshopSession->id], 
                    'method' => 'patch', 'files' => true]) !!}

                        @include('training_workshop_sessions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection