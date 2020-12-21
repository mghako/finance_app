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
                            <button type="button" class="btn btn-success" id="TopupBtn"><i class="fas fa-plus"></i>Top Up</button>
                            <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-warning"><i class="fas fa-ban"></i>Disable</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="">Transaction History</label>
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>

                {{-- modal box section --}}
                <div id="modal-sm-topup" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-sm" role="document">
                        <form action="{{ route('topups.update', $account->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Fill Top up amount...</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="number" name="amount" id="topupInput" class="form-control" autocomplete="off">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Fill</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{$dataTable->scripts()}}
@endpush
@section('custom-scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $('#TopupBtn').click(function(e) {
            $('#modal-sm-topup').modal('show');
            $('#topupInput').focus()
        });
    });
</script>
@endsection