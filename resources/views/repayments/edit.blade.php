@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Repayment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($repayment, ['route' => ['repayments.update', $repayment->id], 'method' => 'patch']) !!}

                        @include('repayments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection