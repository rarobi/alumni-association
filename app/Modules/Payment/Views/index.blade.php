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
                        Payment List
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>User id</th>
                                <th>Payment Type</th>
                                <th>Transaction Id</th>
                                <th>Payment Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->user_id }}</td>
                                    <td> {!! isset($payment->payment_type) ? $payment->payment_type : 'Not Provided' !!}
                                    </td>
                                    {{--<td>@if($payment->image)--}}
                                            {{--<img src="/uploads/event_photo/{{ $payment->image }}" height="50" width="100">--}}
                                        {{--@else--}}
                                            {{--N/A--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    <td>{!! isset($payment->tranaction_id) ? $payment->tranaction_id : 'Not Provided' !!}</td>
                                    <td>{!! isset($payment->payment_date) ? $payment->payment_date : 'Not Provided' !!}</td>
                                    <td>
                                        <a href="{{ route('event.show',$payment->id) }}" class="btn btn-sm btn-info"title="View"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

