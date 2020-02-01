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
                        @if ($logged_in_user->hasRole('payment-receiver-admin'))
                        <a href="{{ url('payment/create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                        @endif
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
                                {{--<th>User Mobile</th>--}}
                                <th>Payment Type</th>
                                <th>Transaction Id</th>
                                <th>Payment Date</th>
                                <th>Branch Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
{{--                                    <td>{{ $payment->user_id }}</td>--}}
                                    <td> {!! isset($payment->payment_type) ? $payment->payment_type : 'Not Provided' !!}
                                    </td>
                                    {{--<td>@if($payment->image)--}}
                                            {{--<img src="/uploads/event_photo/{{ $payment->image }}" height="50" width="100">--}}
                                        {{--@else--}}
                                            {{--N/A--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    <td>{!! isset($payment->transaction_id) ? $payment->transaction_id : 'Not Provided' !!}</td>
                                    <td>{!! isset($payment->payment_date) ? $payment->payment_date : 'Not Provided' !!}</td>
                                    <td>{!! isset($payment->branch_name) ? $payment->branch_name : 'Not Provided' !!}</td>
                                    <td>
                                        {{--<form  action="{{ route('payment.destroy',$payment->id) }}" method="post">--}}
                                            {{--@method('DELETE')--}}
{{--                                            {!! csrf_field() !!}--}}
                                            <a href="{{ route('payment.show',$payment->id) }}" class="btn btn-sm btn-info"title="View"><i class="fa fa-eye"></i></a>
{{--                                            <a href="{{ route('payment.edit',$payment->id) }}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>--}}
                                            @if ($logged_in_user->hasRole('payment-receiver-admin'))
                                        <a href="{{ route('payment.destroy',$payment->id) }}" class="btn btn-sm btn-danger discard-team"title="View"><i class="fa fa-trash"></i></a>
                                        {{--<button type="submit" class="btn btn-sm btn-danger discard-team" title="Discard"><i class="fa fa-trash"></i></button>--}}
                                            @endif
                                        {{--</form>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {!! $payments->render() !!}
                    </div>
                </div><!--col-->

            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
@section('footer-script')
    <script type="text/javascript">

        $('.discard-team').on("click", function(ev) {
            ev.preventDefault();
            var URL = $(this).attr('href');
            var redirectURL = "{{ url('payment') }}";

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false,
                closeOnCancel: false,
//                showLoaderOnConfirm: true
            }).then((isConfirm) => {
                if (isConfirm.value) {
                    $.ajax({
                        type: "DELETE",
                        url: URL,
                        data: {
                            "_token": "{{ csrf_token() }}"
                            },
                        success: function(value){
                               Swal.fire(
                                    'Deleted!',
                                    'This transaction has been deleted successfully.',
                                    'success'
                                    )
                            location.reload(true);
                        }
//                            swal("Deleted!", "This transaction has been deleted successfully.", "success");
//                            window.location.href = redirectURL;
                    })
                }
            })
        });
    </script>
@endsection


