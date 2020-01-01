@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        @if(!$logged_in_user->isAdmin())
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-accent-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary mb-1">Members (Total)</div>
                                <div class="h5 mb-0 font-weight-bold"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <a class="card-footer" href="{{ url('member') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-accent-warning">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning mb-1">Book (Total)</div>
                                <div class="h5 mb-0 font-weight-bold"></div>
                            </div>

                            <div class="col-auto">
                                <i class="fas fa fa-book fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <a class="card-footer" href="{{ route('library.book.entry.index') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-accent-success">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success mb-1"> Total Income</div>
                                <div class="h5 mb-0 font-weight-bold"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-money-bill fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <a class="card-footer" href="{{ route('account.income.index') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card card-accent-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger mb-1"> Total Expense</div>
                                <div class="h5 mb-0 font-weight-bold"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-money-bill-wave fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <a class="card-footer" href="{{ route('account.expense.index') }}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        @else
            <div class="col-md-8 offset-2">
                <h4 class="text-center">Welcome to Dashboard</h4>
            </div>
        @endif
    </div><!--row-->
{{--    <div class="row m-t-50">--}}
{{--        <div class="col-md-8 offset-2">--}}
{{--            <img class="logo" src="{{ asset('img/frontend/logo.jpg') }}" width="750px" height="150" alt="IMG">--}}
{{--        </div>--}}

{{--    </div>--}}

@endsection
