@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Payment Details
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ url('payment') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Go to List"><i class="fas fa-arrow-circle-left"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Paymnet Type</th>
                                <td>{!! isset($payment->payment_type) ? $payment->payment_type : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Transaction ID</th>
                                <td>{!! isset($payment->transaction_id) ? $payment->transaction_id : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Transaction Mobilr Number</th>
                                <td>{!! isset($payment->transaction_number) ? $payment->transaction_number : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Branch Name</th>
                                <td>{!! isset($payment->branch_name) ? $payment->branch_name : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Payment Date</th>
                                <td>{!! isset($payment->payment_date) ? $payment->payment_date : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Document</th>
                                @if(!is_null($payment->document))
                                <td>
                                    <img src="/uploads/store_payment_documents/{{ $payment->document }}" height="200" width="300">
                                </td>
                                @else
                                    <td>
                                      N/A
                                    </td>

                                @endif
                            </tr>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

