@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stories
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'stories.store','files' => true]) !!}

                        @include('stories.fields',['story'=>null])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
