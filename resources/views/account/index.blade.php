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
            <div class="col-md-6">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Create Account</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('accounts.store') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            {{-- Account Name --}}
                            <div class="form-group row">
                                <label for="inputAccountName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAccountName" name="name" placeholder="Account Name" autocomplete="off" REQUIRED>
                                </div>
                            </div>
                            {{-- Account Number --}}
                            <div class="form-group row">
                                <label for="inputAccountNumber" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputAccountNumber" name="number" placeholder="Account Number" min="3" autocomplete="off" REQUIRED>
                                </div>
                            </div>
                            {{-- Account Balance --}}
                            <div class="form-group row">
                                <label for="inputAccountBalance" class="col-sm-2 col-form-label">Balance</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputAccountBalance" name="balance" placeholder="Account Balance" autocomplete="off" REQUIRED>
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
                <table class="table">
                    <tr>
                        <th>Account Name</th>
                        <th>Setting</th>
                    </tr>
                    @foreach($accounts as $account)
                    <tr>
                        <td>{{ $account->name }}</td>
                        <td><a href="{{ route('accounts.edit', $account->id) }}" class="text-warning"><i class="fas fa-edit"></i> Edit</a></td>
                    </tr>
                    @endforeach
                </table>
                {{-- pagination --}}
                {{ $accounts->links() }}
            </div>
        </div>
    </div>
@endsection