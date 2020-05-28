@extends('layouts.app')

@section('content')
    <section class="content-header">
    <?php if(Auth::check() && Auth::user()->type=='Admin'){ ?>
        <h1>
        Lender
        </h1>
        <?php }?>
        <?php if(Auth::check() && Auth::user()->type=='Lender'){ ?>
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
                    @include('lenders.show_fields')
                    <a href="{{ route('lenders.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
