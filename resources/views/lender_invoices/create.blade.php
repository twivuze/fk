@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Loan Invoice
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'lenderInvoices.store']) !!}

                        @include('lender_invoices.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
