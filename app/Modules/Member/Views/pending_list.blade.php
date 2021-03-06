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
                    Members <small class="text-muted"> Pending List</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @if($logged_in_user->isAdmin())
                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                    <a href="{{ route('member.index') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Member List"><i class="fas fa-list"></i></a>
{{--                    <a href="{{ url('member/create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>--}}
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
                            <th>#</th>
                            <th>Batch</th>
                            <th>B.Sc Roll</th>
                            <th>@lang('labels.backend.access.users.table.name')</th>
                            <th>@lang('labels.backend.access.users.table.email')</th>
                            <th>Member Status</th>
                            <th>@lang('labels.backend.access.users.table.last_updated')</th>
{{--                            @if($logged_in_user->isAdmin())--}}
                            <th>@lang('labels.general.actions')</th>
{{--                            @endif--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pending_users as $key => $pending_user)
                            <tr>
                                <td>{{ $key + $pending_users->firstItem() }}</td>
                                <td>{{ $pending_user->profile->batch_id }}</td>
                                <td>{{ $pending_user->profile->roll }}</td>
                                <td>{{ $pending_user->first_name }}</td>
                                <td>{{ $pending_user->email }}</td>
                                <td>{{ $pending_user->member_status }}</td>
                                <td>{!! $pending_user->roles_label !!}</td>
                                <td>{{ $pending_user->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('member.show', $pending_user->id) }}" class="btn btn-sm btn-info"title="View"><i class="fa fa-eye"></i></a>
                                    @if($logged_in_user->isAdmin())
                                    <a href="{{ route('member.edit', $pending_user->id) }}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>
                                    @endif
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
                    {!! $pending_users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $pending_users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $pending_users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
