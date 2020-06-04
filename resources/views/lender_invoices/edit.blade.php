@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lender Invoice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lenderInvoice, ['route' => ['lenderInvoices.update', $lenderInvoice->id], 'method' => 'patch']) !!}

                        @include('lender_invoices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection