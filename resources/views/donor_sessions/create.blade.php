@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Donor Session
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'donorSessions.store', 'files' => true]) !!}

                        @include('donor_sessions.fields',['donorSession'=>null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
