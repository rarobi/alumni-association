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
                        Books Publisher
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="#" class="btn btn-success ml-1" data-toggle="modal" data-target="#publisherForm" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
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
                                <th>Publisher Name</th>
                                <th>Publisher Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->id }}</td>
                                    <td>{{ $publisher->name }}</td>
                                    <td> @if($publisher->status == 1)
                                           <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inctive</span>
                                        @endif
                                    </td>
                                    <td>{!! $publisher->created_at !!}</td>
                                    <td>
                                        <form  action="{{ route('settings.book.publisher.destroy',$publisher->id) }}" method="post">
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <a href="{{ route('settings.book.publisher.edit',$publisher->id) }}" class="btn btn-sm btn-info"title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger discard-team" title="Discard"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
        <div class="modal fade" id="publisherForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 font-weight-bold">Add book publisher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ html()->form('POST', route('settings.book.publisher.store'))->class('form-horizontal')->open() }}
                    <div class="modal-body">
                        <div class="row">
                            {{ html()->label('Name')->class('col-md-3 form-control-label required') }}
                            {{ html()->text('name')
                                ->class('form-control col-md-6')
                                ->placeholder('Enter Publisher Name')
                                ->required() }}
                        </div>
                        <br>
                        <div class="row">

                            {{ html()->label('Status')->class('col-md-3 form-control-label required') }}
                            {{ html()->select('status')
                                ->options(['' => "Select status", '1' => 'Active', '0' => 'Inactive'])
                                ->class('form-control col-md-6')
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

