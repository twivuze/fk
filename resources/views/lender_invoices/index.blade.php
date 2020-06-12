@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Lender Transactions</h1>
        <h1 class="pull-right">
            <?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/enterprises" target="_blank">Lend New</a>
            <?php } ?>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('lender_invoices.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

