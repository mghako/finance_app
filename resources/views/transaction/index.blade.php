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
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Create Transaction</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            {{-- Account --}}
                            <div class="form-group row">
                                <label for="inputAccount" class="col-sm-2 col-form-label">Account</label>
                                <div class="col-sm-10">
                                    <select name="account" id="" class="form-control">
                                        @foreach($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="number" class="form-control" id="inputAccount" placeholder="Amount"> --}}
                                </div>
                            </div>
                            {{-- Amount --}}
                            <div class="form-group row">
                                <label for="inputAmount" class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputAmount" name="amount" placeholder="Amount" autocomplete="off">
                                </div>
                            </div>
                            {{-- Description --}}
                            <div class="form-group row">
                                <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" id="inputDescription" placeholder="Description" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Create</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    </div>
            </div>
            <div class="col-md-6">
                <h2>Transaction History</h2>
                <table class="table">
                    <tr>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Description</th>
                    </tr>
                     @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->account->name}}</td>
                        <td>{{ $transaction->amount}}</td>
                        <td>{{ $transaction->description}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection