@extends('layouts.dashboard')
@section('page-title', 'Account Profile')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ $account->name }} <span class="badge badge-info">{{ $account->number }} </span> Balance <span class="badge badge-primary">{{ $account->balance }}</span> <small>Kyats</small>
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('accounts.edit', $account->id) }}"><i class="fas fa-edit"></i>Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="">Transaction History</label>
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush