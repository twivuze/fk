@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Center
        </h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($center, ['route' => ['centers.update', $center->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('centers.fields',['session_id'=>$center->session_id])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection