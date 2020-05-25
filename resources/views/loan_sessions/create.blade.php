@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Loan Sessions
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'loanSessions.store','files' => true]) !!}

                        @include('loan_sessions.fields',['loanSessions'=>null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
