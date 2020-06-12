@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Money Transfered</h1>
        <?php if(\Auth::user()->type=='Admin'){ ?>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('transfers.create') }}">Add New</a>
        </h1>
        <?php } ?>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('transfers.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

