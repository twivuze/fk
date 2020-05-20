@extends('layouts.app')
<?php if(Auth::check() || Auth::user()->type=='Admin'){ ?>
@section('content')
    <section class="content-header">
        <h1>
            Micro Fund Application
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($microFundApplication, ['route' => ['microFundApplications.update', $microFundApplication->id], 'method' => 'patch']) !!}

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