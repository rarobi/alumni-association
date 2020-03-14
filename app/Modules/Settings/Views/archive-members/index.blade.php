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
                    Members <small class="text-muted">Archived List</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    @if($logged_in_user->isAdmin())
                    <a href="{{ url('settings/alumni/archive/create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Batch</th>
                            <th>Session</th>
                            <th>Designation</th>
                            <th>Elected Years</th>
{{--                            <th>Image</th>--}}
                            @if($logged_in_user->isAdmin())
                            <th>@lang('labels.general.actions')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($archive_members as $key => $archive_member)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ isset($archive_member->name) ? $archive_member->name : 'Not Provided' }}</td>
                                <td>{{ isset($archive_member->batch) ? $archive_member->batch : 'Not Provided' }}</td>
                                <td>{{ $archive_member->session }}</td>
                                <td>{{ $archive_member->designation }}</td>
                                <td>{{ $archive_member->elected_years }}</td>
{{--                                <td>{{ $archive_member->image }}</td>--}}
                                @if($logged_in_user->isAdmin())
                                    <td>
                                        <a href="{!! url('settings/alumni/archive', $archive_member->id) !!}" class="btn btn-sm btn-info"title="View"><i class="fa fa-eye"></i></a>
{{--                                        <a href="{!! url('member/'.$archive_member->id.'/edit') !!}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>--}}
                                    </td>
                                @endif
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
{{--                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}--}}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
{{--                    {!! $users->render() !!}--}}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
