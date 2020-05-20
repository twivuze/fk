@extends('layouts.app')
<?php if(Auth::check() || Auth::user()->type=='Admin'){ ?>
@section('content')
    <section class="content-header">
        <h1>
            Micro Fund Application
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('micro_fund_applications.show_fields')
                    <a href="{{ route('microFundApplications.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<?php }else{
    echo "<h1>You are not admin</h1>";
} ?>