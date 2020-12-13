@extends('layouts.dashboard')
@section('page-title', 'Profile')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h3>{{ auth()->user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection