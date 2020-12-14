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
                        <div class="card-tools">
                            <a href="{{ route('accounts.create') }}" class="btn btn-info">Create</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Account Name</th>
                                <th>Balance</th>
                                <th>Setting</th>
                            </tr>
                            @foreach($accounts as $account)
                            <tr>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->balance }}</td>
                                <td><a href="{{ route('accounts.show', $account->id) }}" class="text-info"><i class="fas fa-eye"></i> View</a></td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $accounts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection