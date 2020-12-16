@extends('layouts.dashboard')
@section('page-title', 'Account')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            {{-- flash message for user account creating --}}
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Accounts List
                        </div>
                        
                    </div>
                    <div class="card-body table-responsive">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush