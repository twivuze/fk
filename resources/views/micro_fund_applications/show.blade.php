@extends('layouts.app')
<?php if(Auth::check()){ ?>
@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Fund Manager
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='MicroFoundManager'){ ?>
        <h1>
        My Application
        </h1>
        <br>
        @include('flash::message')
        <?php }?>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('micro_fund_applications.show_fields')
                    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
                    <a href="{{ route('microFundApplications.index') }}" class="btn btn-default">Back</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
@endsection
<?php }else{
    echo "<h1>You are not admin</h1>";
} ?>