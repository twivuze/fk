
@extends('layouts.app')
<?php if(Auth::check() || Auth::user()->type=='Admin'){
     $pending=\App\Models\LoanApplication::where('category','=','Enterprises-Awaiting-Funding')->get();
     $shortlisted=\App\Models\LoanApplication::where('category','=','Fully-Funded-Enterprises')->get();
     $diasporaBank=\App\Models\LoanApplication::where('category','=','Diaspora-Funded-Enterprises')->get();
    ?>
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Enterprises</h1>
        <h1 class="pull-right">
           <!-- <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('centers.create') }}">Add New</a> -->
        </h1>
    </section>
    <br>
    <br>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

       

        <div id="exTab1" class="">
        <ul class="nav nav-pills">
            <li class="active">
                <a href="#1a" data-toggle="tab">All</a>
            </li>
            <li><a href="#2a" data-toggle="tab">Enterprises-Awaiting-Funding</a>
            </li>
            <li><a href="#3a" data-toggle="tab">Diaspora-Funded-Enterprises</a>
            </li>
            <li><a href="#4a" data-toggle="tab">Enterprises-Awaiting-Funding</a>
            </li>

        </ul>

        <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('loan_applications.table')
                    </div>
                </div>
                <div class="text-center">

                  

                </div>
            </div>
            <div class="tab-pane" id="2a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('loan_applications.shortlisted-table',['shortlisted'=>$shortlisted])  
                    </div>

                    <div class="text-center">
                        
                     </div>

                </div>
            </div>
            <div class="tab-pane" id="3a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('loan_applications.diaspora-bank-table',['diasporaBank'=>$diasporaBank])  
                    </div>

                    <div class="text-center">
                        
                     </div>

                </div>
            </div>

            <div class="tab-pane" id="4a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('loan_applications.pending-table',['pending'=>$pending])  
                    </div>

                    <div class="text-center">
                        
                     </div>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

<?php }else{
    echo "<h1>You are not admin</h1>";
} ?>
