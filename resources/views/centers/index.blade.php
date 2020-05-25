@extends('layouts.app')
<?php if(Auth::check() || Auth::user()->type=='Admin'){
     $activeApplicants=\App\Models\Center::where('status','=','Active')->get();
     $inActiveApplicants=\App\Models\Center::where('status','=','Inactive')->get();
    ?>
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Centers</h1>
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
            <li><a href="#2a" data-toggle="tab">Active</a>
            </li>
            <li><a href="#3a" data-toggle="tab">InActive</a>
            </li>

        </ul>

        <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('centers.table')
                    </div>
                </div>
                <div class="text-center">

                  

                </div>
            </div>
            <div class="tab-pane" id="2a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('centers.active-table',['activeApplicants'=>$activeApplicants])  
                    </div>

                    <div class="text-center">
                        
                     </div>

                </div>
            </div>
            <div class="tab-pane" id="3a">
                <div class="box box-primary">
                    <div class="box-body">
                    @include('centers.inactive-table',['inActiveApplicants'=>$inActiveApplicants])  
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