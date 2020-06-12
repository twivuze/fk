@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transfer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transfer, ['route' => ['transfers.update', $transfer->id], 'method' => 'patch']) !!}

                        @include('transfers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection