@extends('layouts.dashboard')
@section('page-title', 'Account Profile')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            {{ $account->name }} <span class="badge badge-info">{{ $account->number }} </span>
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('accounts.edit', $account->id) }}"><i class="fas fa-edit"></i>Edit</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="">Transaction History</label>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Created at</th>
                                </tr>
                                @foreach($account->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection