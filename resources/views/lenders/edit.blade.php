@extends('layouts.app')

@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Lender
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
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
                   {!! Form::model($lender, ['route' => ['lenders.update', $lender->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('lenders.fields',['session_id'=>$lender->id])

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection