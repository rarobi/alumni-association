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
                        Batch List
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        @if($logged_in_user->isAdmin())
                        <a href="#" class="btn btn-success ml-1" data-toggle="modal" data-target="#categoryForm" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                        @endif
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            @if(count($batches) > 0)
            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Batch</th>
                                <th>Created Date</th>
                                @if($logged_in_user->isAdmin())
                                <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($batches as $batch)
                                <tr>
                                    <td>{{ $batch->id }}</td>
                                    <td>{{ $batch->name }}</td>
                                    <td>{!! $batch->created_at !!}</td>
                                    @if($logged_in_user->isAdmin())
                                    <td>
                                        <form  action="{{ route('settings.alumni.batch.destroy',$batch->id) }}" method="post">
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <a href="{{ route('settings.alumni.batch.edit',$batch->id) }}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger discard-team" title="Discard"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            @else
            <div class="text-center">
                <h4>No Batch Found</h4>
            </div>
            @endif
        </div><!--card-body-->
        <div class="modal fade" id="categoryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 font-weight-bold">Add batch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ html()->form('POST', route('settings.alumni.batch.store'))->class('form-horizontal')->open() }}
                    <div class="modal-body">
                        <div class="row">
                            {{ html()->label('Name')->class('col-md-3 form-control-label required') }}
                            {{ html()->text('name')
                                ->class('form-control col-md-6')
                                ->placeholder('Enter Batch Name (Ex. Batch-01)')
                                ->required() }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal" aria-label="Close">Close</button>
                        {{ form_submit(__('buttons.general.crud.create'))->class('btn btn-success pull-right') }}
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>

    </div><!--card-->
@endsection

