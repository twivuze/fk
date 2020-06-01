@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conference Application
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($conferenceApplication, ['route' => ['conferenceApplications.update', $conferenceApplication->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('conference_applications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection