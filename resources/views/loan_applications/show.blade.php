@extends('layouts.app')

@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Enterprise
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='Enterprise'){ ?>
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
                    @include('loan_applications.show_fields')
                    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
                    <a href="{{ route('loanApplications.index') }}" class="btn btn-default">Back</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
@endsection
