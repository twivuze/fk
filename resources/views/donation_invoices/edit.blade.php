@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Donation Invoice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($donationInvoice, ['route' => ['donationInvoices.update', $donationInvoice->id], 'method' => 'patch']) !!}

                        @include('donation_invoices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection