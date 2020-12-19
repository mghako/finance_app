@extends('layouts.dashboard')
@section('page-title', 'Edit Account')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{ $account->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('accounts.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="name" value="{{ $account->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNumber" name="number" value="{{ $account->number }}">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    </div>
            </div>
        </div>
    </div>
@endsection