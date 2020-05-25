@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lender
        </h1>
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