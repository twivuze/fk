@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Donor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($donor, ['route' => ['donors.update', $donor->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('donors.fields',['session_id'=>$donor->session_id])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection