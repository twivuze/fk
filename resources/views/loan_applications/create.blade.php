@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
        Enterprise
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'loanApplications.store', 'files' => true]) !!}

                        @include('loan_applications.fields',['session_id'=>$session->id])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
