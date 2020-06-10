@extends('layouts.app')
<?php if(Auth::check()){ ?>
@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Fund Manager
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>
        <h1>
        My Application
        </h1>
        <br>
        @include('flash::message')
        <?php }?>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       @include('flash::message')
       
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($microFundApplication, ['route' => 
                   ['microFundApplications.update', $microFundApplication->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('micro_fund_applications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
<?php }else{
    echo "<h1>You are not admin</h1>";
} ?>