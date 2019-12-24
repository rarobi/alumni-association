@extends('backend.layouts.app')
@section('header-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/buttons.dataTables.min.css') }}"/>
    <style type="text/css">
        .activeCLS{
            background-color: yellow;
        }
        .card-accent-primary:hover{
            background-color: yellow;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row" style="padding: 5px">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Account <small class="text-muted">{{ $listName }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <div class="row" style="padding-top: 15px;">
                <div class="col-md-12">
                    <ul class="nav nav-pills alert alert-primary">
                        <li class="nav-item">
                            <a class="nav-link {{ ($param=='all')?'active':'' }}" href="{{ url('/account/list/all') }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($param=='today')?'active':'' }}" href="{{ url('/account/list/today') }}">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (in_array($param,['january','february','march','april','may','june','july','august','september','october','november','december']))?'active':'' }}" href="{{ url('/account/list/'.$currentMonth) }}">Month Wise</a>
                        </li>
                    </ul>
                </div>
                @if(in_array($param,['current-month','january','february','march','april','may','june','july','august','september','october','november','december']))
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='january')?'activeCLS':'' }}" href="{{ url('/account/list/january') }}">January</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='february')?'activeCLS':'' }}" href="{{ url('/account/list/february') }}">February</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='march')?'activeCLS':'' }}" href="{{ url('/account/list/march') }}">March</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='april')?'activeCLS':'' }}" href="{{ url('/account/list/april') }}">April</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='may')?'activeCLS':'' }}" href="{{ url('/account/list/may') }}">May</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='june')?'activeCLS':'' }}" href="{{ url('/account/list/june') }}">June</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='july')?'activeCLS':'' }}" href="{{ url('/account/list/july') }}">July</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='august')?'activeCLS':'' }}" href="{{ url('/account/list/august') }}">August</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='september')?'activeCLS':'' }}" href="{{ url('/account/list/september') }}">September</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='october')?'activeCLS':'' }}" href="{{ url('/account/list/october') }}">October</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='november')?'activeCLS':'' }}" href="{{ url('/account/list/november') }}">November</a>
                        </li>
                        <li class="card card-accent-primary col-md-2" style="padding:0">
                            <a class="nav-link {{ ($param=='december')?'activeCLS':'' }}" href="{{ url('/account/list/december') }}">December</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>

            <div class="row mt-4">

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card card-accent-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success mb-1">Total Income</div>
                                    <div class="h5 mb-0 font-weight-bold">
                                        {{ isset($statistics->total_income)?$statistics->total_income:0 }} Tk
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card card-accent-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger mb-1">Total Expense</div>
                                    <div class="h5 mb-0 font-weight-bold">
                                        {{ isset($statistics->total_expense)?$statistics->total_expense:0 }} Tk
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-money-bill-wave fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card card-accent-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary mb-1">Balance</div>
                                    <div class="h5 mb-0 font-weight-bold">
                                        {{ isset($statistics->balance)?$statistics->balance:0 }} Tk
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-piggy-bank fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

@section('footer-script')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @if(isset($dataTable))
        {!! $dataTable->scripts() !!}
    @endif
@endsection
