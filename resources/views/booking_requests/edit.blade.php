@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Booking Request
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bookingRequest, ['route' => ['bookingRequests.update', $bookingRequest->id], 'method' => 'patch']) !!}

                        @include('booking_requests.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection