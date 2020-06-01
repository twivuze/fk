@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Partener Session
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($partenerSession, ['route' => ['partenerSessions.update', $partenerSession->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('partener_sessions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection