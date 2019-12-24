@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
@section('header-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Expense Management <small class="text-muted">Expense List</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @if($logged_in_user->isAdmin())
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="#" class="btn btn-success ml-1" data-toggle="modal" data-target="#incomeForm" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                    @endif
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Transaction Date</th>
                                <th>Amount</th>
                                <th>Purpose</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expenses as $key => $expense)
                                <tr>
                                    <td>{{ ++$key }}.</td>
                                    <td>{{ \Carbon\Carbon::parse($expense->created_at)->format('F d, Y') }}</td>
                                    <td>{{ $expense->amount }} Tk</td>
                                    <td>{{ str_limit($expense->purpose, 15) }}</td>
                                    <td>
                                        <a href="{{ route('account.expense.show', $expense->id) }}" class="btn btn-sm btn-info"title="View"><i class="fa fa-list"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
        <div class="modal fade" id="incomeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold">Add Expense</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ html()->form('POST', route('account.expense.store'))->class('form-horizontal')->open() }}
                    <div class="modal-body">
                        <div class="form-group form-inline">
                            {{ html()->label('Amount')->class('col-md-3 form-control-label required') }}
                            <input type="number" name="amount" class="form-control col-md-8" placeholder="Enter an amount" required>
                        </div>
                        <div class="form-group form-inline">
                            {{ html()->label('Date')->class('col-md-3 form-control-label required') }}
                            {{ html()->text('transaction_date')
                                ->class('form-control col-md-8')
                                ->placeholder('Transaction Date')
                                ->attribute('autocomplete','off')
                                ->id('transaction_date')
                            }}
                        </div>

                        <div id="purposeDiv">
                            <div class="form-group form-inline">
                                {{ html()->label('Purpose')->class('col-md-3 form-control-label required') }}
                                {{ html()->select('purpose_id', $purposes)
                                    ->placeholder('Select Purpose')
                                    ->attribute('required')
                                    ->id('purposeId')
                                    ->class('form-control col-md-8') }}
                            </div>

                            <div class="form-group form-inline" id="purposeTextDiv">
                                {{ html()->label('')->class('col-md-3 form-control-label') }}
                                {{ html()->text('purpose')
                                    ->placeholder('Write purpose')
                                    ->id('purposeText')
                                    ->class('form-control col-md-8') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">Close</button>
                        {{ form_submit(__('buttons.general.crud.create'))->class('btn btn-success') }}
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>

    </div><!--card-->
@endsection
@section('footer-script')
    <script src="{{ URL::asset('vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).on("change", "#purposeId", function(){
            var purpose = $(this).val();
            if(purpose == 1){
                $('#purposeTextDiv').show();
            }else{
                $('#purposeTextDiv').hide();
            }
        });

        $('#purposeTextDiv').hide();
        $("#purposeId").trigger("change");

        $(document).ready(function () {
            $('#transaction_date').datepicker({
                format:"yyyy-mm-dd",
                defaultDate: new Date()
            });
            $('#transaction_date').datepicker('setDate', new Date());
        });





    </script>
@endsection
