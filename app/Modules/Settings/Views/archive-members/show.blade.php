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
                        Archive Details
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ url('settings/alumni/archive') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Go to List"><i class="fas fa-arrow-circle-left"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{!! isset($archive->name) ? $archive->name : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Batch</th>
                                <td>{!! isset($archive->batch) ? $archive->batch : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Session</th>
                                <td>{!! isset($archive->session) ? $archive->session : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Designation</th>
                                <td>{!! isset($archive->designation) ? $archive->designation : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Elected years</th>
                                <td>{!! isset($archive->elected_years) ? $archive->elected_years : 'N/A' !!}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                @if(!is_null($archive->image))
                                <td>
                                    <img src="/uploads/archive_elected_members/{{ $archive->image }}" height="200" width="300">
                                </td>
                                @else
                                    <td>
                                      N/A
                                    </td>

                                @endif
                            </tr>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection

