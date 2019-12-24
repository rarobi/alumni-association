@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Expense Management <small class="text-muted">Expense Details</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            {{--{!! dd($book->category) !!}--}}
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Amount</th>
                                <td>{{ $expense->amount}}</td>
                            </tr>

                            <tr>
                                <th>Purpose</th>
                                <td>{{ $expense->purpose }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    <a href="{{ route('account.expense.index') }}" class="btn btn-danger btn-sm float-left">Close</a>
            </div><!--row-->
        </div><!--card-body-->
    </div>
@endsection
