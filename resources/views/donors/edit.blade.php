@extends('layouts.app')

@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Donor
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='Donor'){ ?>
        <h1>
        My Application
        </h1>
        <br>
        @include('flash::message')
        <?php }?>
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