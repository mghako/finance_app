@extends('layouts.dashboard')
@section('page-title', 'Transaction')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                {{ $dataTable->table() }}
            </div>
            <div class="col-md-6">
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush