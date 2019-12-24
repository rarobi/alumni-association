@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="card-title mb-0">
                        Library Management <small class="text-muted">Return Book</small>
                    </h4>
                </div><!--col-->
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    {{ html()->form('GET','')->attribute('accept-charset','UTF-8')->open() }}
                    <div class="input-group">
                        {{ html()->select('member_id', $members)
                            ->class('form-control')
                            ->attribute('maxlength', 191)
                            ->required() }}

                        <span class="input-group-btn">
                            <button class="btn btn-primary font-weight-normal" type="submit" style="border-radius: 0;">
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                    {{ html()->form()->close() }}
                </div>
                <!--end of col-->
            </div>

            @if(isset($records) && count($records)>0)
            {{ html()->form('PATCH',route('library.book.return.update',$memberId))->open() }}
            {{ html()->hidden("member_id")->value($memberId) }}
            @foreach($records as $borrowId => $record)
            {{ html()->hidden("borrow_id[$borrowId]")->value($borrowId) }}
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm table-stripped">
                            <thead>
                            <tr>
                                <td colspan="7">
                                    <strong>Issue Date : </strong>{{ $record['issue_date'] }} /
                                    <strong>Return Status : </strong> @if($record['is_returned']) <label class="badge badge-success">Returned</label> @else <label class="badge badge-danger">Not Returned</label> @endif /
                                    <strong>Date to Return : </strong> {{ $record['date_for_return'] }} /
                                    <strong>Return Date : </strong> {{ $record['returned_date'] }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Book Name</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Quantity</th>
                                <th>Return Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($record['borrow_details_id'] as $key => $borrowDetailsId)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $record['book_name'][$key] }}</td>
                                <td>{{ $record['book_category'][$key] }}</td>
                                <td>{{ $record['book_publisher'][$key] }}</td>
                                <td>{{ $record['book_quantity'][$key] }}</td>
                                <td>
                                    @if($record['return_status'][$key])
                                    <label class="badge badge-success">Returned</label>
                                    @else
                                    <label class="badge badge-danger">Not Returned</label>
                                    @endif
                                </td>
                                <td width="15%" class="text-center">
                                    @if($record['return_status'][$key])
                                        -
                                    @else
                                    {{ html()->select("return_status[$borrowId][$borrowDetailsId]", [1=>'Received',0=>'Not Received'])
                                        ->class('form-control')
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            @endforeach
            <div class="form-group row">
                @if($logged_in_user->isAdmin())
                <div class="col text-right">
                    {{ form_submit('Receive Books') }}
                </div><!--col-->
                @endif
            </div>
            {{ html()->form()->close() }}
            @endif
        </div><!--card-body-->
    </div><!--card-->
@endsection
