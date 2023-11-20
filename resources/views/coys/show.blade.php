@extends('layouts.master')

@section('title')
        Coy Details
    @endsection

@section('page-title')
    
    Coy Details
@endsection

@section('body')
    <body>
@endsection

@section('content')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('coys.show_fields')
                </div>
            </div>
            <a class="btn btn-default" href="{{ route('coys.index') }}">
                Back
                </a>
        </div>

@endsection

@section('scripts')
    
    {{-- apexcharts --}}
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    {{-- dashboard-sales.init.js --}}
    <script src="{{ URL::asset('build/js/pages/dashboard-sales.init.js') }}"></script>
    {{-- App js --}}
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
@endsection
    
