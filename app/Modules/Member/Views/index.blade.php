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
                    Members <small class="text-muted">Approved List</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
{{--                @if($logged_in_user->isAdmin())--}}
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
				    <a href="{{ url('member/pending_list') }}" class="btn btn-danger ml-1" data-toggle="tooltip" title="Pending List"><i class="fas fa-list"></i></a>
				    <a href="{{ url('member/create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
				</div><!--btn-toolbar-->
{{--                @endif--}}
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Batch</th>
                            <th>B.Sc Roll</th>
                            <th>@lang('labels.backend.access.users.table.name')</th>
                            <th>@lang('labels.backend.access.users.table.email')</th>
                            <th>Member Status</th>
{{--                            <th>Blood Group</th>--}}
                            <th>@lang('labels.backend.access.users.table.roles')</th>
                            <th>@lang('labels.backend.access.users.table.last_updated')</th>
                            @if($logged_in_user->isAdmin())
                            <th>@lang('labels.general.actions')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key + $users->firstItem() }}</td>
                                <td>{{ isset($user->batch_id) ? $user->batch_id : 'Not Provided' }}</td>
                                <td>{{ isset($user->roll) ? $user->roll : 'Not Provided' }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->member_status }}</td>
{{--                                <td>{{ !empty($user->blood_group)?$user->blood_group:'N/A' }}</td>--}}
                                <td>{!! $user->roles_label !!}</td>
                                <td>{{ $user->updated_at }}</td>
                                @if($logged_in_user->isAdmin())
                                <td>{!! $user->action_buttons !!}</td>
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
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
