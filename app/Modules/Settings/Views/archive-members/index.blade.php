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
                    <a href="{{ url('member/review_list') }}" class="btn btn-info ml-1" data-toggle="tooltip" title="Review List"><i class="fas fa-users"></i></a>
                    @if($logged_in_user->isAdmin())
                    <a href="{{ url('member/create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    <a href="{{ url('member/pending_list') }}" class="btn btn-danger ml-1" data-toggle="tooltip" title="Pending List"><i class="fas fa-list"></i></a>
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
                            <th>Image</th>
                            @if($logged_in_user->isAdmin())
                            <th>@lang('labels.general.actions')</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($users as $key => $user)--}}
{{--                         {!! dd($user) !!}--}}
                            {{--<tr>--}}
                                {{--<td>{{ $key + $users->firstItem() }}</td>--}}
                                {{--<td>{{ isset($user->batch_id) ? $user->batch_id : 'Not Provided' }}</td>--}}
                                {{--<td>{{ isset($user->roll) ? $user->roll : 'Not Provided' }}</td>--}}
                                {{--<td>{{ $user->first_name }}</td>--}}
                                {{--<td>{{ $user->email }}</td>--}}
                                {{--<td>{{ $user->member_status }}</td>--}}
{{--                                <td>{{ !empty($user->blood_group)?$user->blood_group:'N/A' }}</td>--}}
                                {{--<td>{!! $user->roles_label !!}</td>--}}
                                {{--<td>{{ $user->updated_at }}</td>--}}
                                {{--@if($logged_in_user->isAdmin())--}}
{{--                                <td>{!! $user->action_buttons !!}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{!! url('member', $user->user_id) !!}" class="btn btn-sm btn-info"title="View"><i class="fa fa-eye"></i></a>--}}
                                        {{--<a href="{!! url('member/'.$user->user_id.'/edit') !!}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>--}}
                                    {{--</td>--}}
                                {{--@endif--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
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
