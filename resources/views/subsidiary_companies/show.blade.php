@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subsidiary Companies
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('subsidiary_companies.show_fields')
                    <a href="{{ route('subsidiaryCompanies.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
