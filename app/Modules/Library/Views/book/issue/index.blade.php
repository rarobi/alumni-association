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
                        Library Management <small class="text-muted">Available Book Issues</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @if($logged_in_user->isAdmin())
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('library.book.issue.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
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
                                <th>ID</th>
                                <th>Issue Date</th>
                                <th>Expected Return Date</th>
                                <th>Member Name</th>
                                <th>Member Email</th>
                                <th>Return Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookIssues as $issue)
                                <tr>
                                    <td>{{ $issue->id }}</td>
                                    <td>{{ Carbon\Carbon::parse($issue->issue_date)->format('F d, Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($issue->date_for_return)->format('F d, Y') }}</td>
                                    <td>{{ $issue->member_name }}</td>
                                    <td>{{ $issue->member_email }}</td>
                                    <td>
                                        @if($issue->status)
                                            <span class="badge badge-success">Returned</span>
                                        @else
                                            <span class="badge badge-danger">Not Returned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('library/book/issue/'.$issue->id) }}" class="btn btn-sm btn-info" title="View"><i class="fa fa-list"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
{{--                        {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}--}}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
{{--                        {!! $users->render() !!}--}}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
