@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Member Management
                    <small class="text-muted">View Member</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> @lang('labels.backend.access.users.tabs.titles.overview')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#in-out" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-calendar-check"></i> @lang('labels.backend.access.users.tabs.titles.in-out')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#subscription" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-money-bill"></i> @lang('labels.backend.access.users.tabs.titles.subscription')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#account" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-database"></i> @lang('labels.backend.access.users.tabs.titles.account')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#library" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-book"></i> @lang('labels.backend.access.users.tabs.titles.library')</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="row">
                            <div class="offset-sm-5 col-sm-7">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')" style="margin: 0px 15px 3px 0px" >
                                    <a href="{!! route('member.edit',$user->id) !!}" class="btn btn-primary ml-1" data-toggle="tooltip" title="Edit Member"><i class="fas fa-edit"></i></a>
                                </div><!--btn-toolbar-->
                            </div><!--col-->
                        </div><!--row-->
{{--                        <hr>--}}
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Email Address</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>{!! $user->status_label !!}</td>
                                    </tr>

                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{ isset($user->mobile) ? $user->mobile : 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Blood Group</th>
                                        <td>{{ isset($user->blood_group) ? $user->blood_group : 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Membership ID</th>
                                        <td>
                                            @if($user->membership_id)
                                                {{ $user->membership_id }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Membership Type</th>
                                        <td>
                                            @if($user->membership_type)
                                                {{ ucfirst($user->membership_type) }}
                                            @else
                                                {{ html()->form('POST', route('member.membership',$user->id))->class('form-horizontal')->open() }}
                                                <div class="form-group row">
                                                    <div class="col-md-10">
                                                        {{ html()->select('membership_type')
                                                            ->options(['' => "Select Type", 'temporary' => 'Temporary', 'parmanent' => 'Parmanent', 'executive' => 'Executive'])
                                                            ->class('form-control')
                                                            ->attribute('maxlength', 191) }}
                                                    </div><!--col-->
                                                    <div class="col-md-2">
                                                        {{ form_submit(__('Add')) }}
                                                    </div><!--col-->
                                                </div><!--form-group-->
                                                {{ html()->form()->close() }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Membership Activation Date</th>
                                        <td>
                                            @if($user->membership_activation_date)
                                                {{ $user->membership_activation_date }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>

                                   <tr>
                                       <th>Membership End Date</th>
                                       <td>
                                           @if($user->membership_end_date)
                                               {{ $user->membership_end_date }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Date of Birth</th>
                                       <td>
                                           @if($user->dob)
                                               {{ $user->dob }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Present Job</th>
                                       <td>
                                           @if($user->occupation)
                                               {{ $user->occupation}}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Job Position</th>
                                       <td>
{{--                                            @if($user->occupation)--}}
{{--                                                {{ $user->occupation}}--}}
{{--                                            @else--}}
                                               N/A
{{--                                            @endif--}}
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Present Address</th>
                                       <td>
                                           @if($user->present_address)
                                               {{ $user->present_address}}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Permanent Address</th>
                                       <td>
                                           @if($user->permanent_address)
                                               {{ $user->permanent_address}}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>NID Number</th>
                                       <td>
                                           @if($user->nid)
                                               {{ $user->nid}}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                                   <tr>
                                       <th>Passport Number</th>
                                       <td>
                                           @if($user->passport)
                                               {{ $user->passport}}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                               </table>
                           </div>
                       </div><!--table-responsive-->
                   </div>
                   <div class="tab-pane" id="in-out" role="tabpanel">
                       <div class="col">
                           <div class="table-responsive">
                               <table class="table table-hover">
                                   <tr>
                                       <th>Date</th>
                                       <th>Logged In</th>
                                       <th>Logged Out</th>
                                   </tr>
                                   <tr>
                                       <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                       <td> @if($user->last_login_at)
                                               {{ $user->last_login_at }}
                                            @else
                                               N/A
                                            @endif
                                       </td>
                                       <td>@if($user->to_be_logged_out)
                                               {{ $user->to_be_logged_out }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                       <td> @if($user->last_login_at)
                                               {{ $user->last_login_at }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                       <td>@if($user->to_be_logged_out)
                                               {{ $user->to_be_logged_out }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                       <td> @if($user->last_login_at)
                                               {{ $user->last_login_at }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                       <td>@if($user->to_be_logged_out)
                                               {{ $user->to_be_logged_out }}
                                           @else
                                               N/A
                                           @endif
                                       </td>
                                   </tr>

                               </table>
                           </div>
                       </div><!--table-responsive-->
                   </div>
                   <div class="tab-pane" id="subscription" role="tabpanel">
{{--                       <div class="row">--}}
{{--                           <div class="offset-sm-5 col-sm-7">--}}
{{--                               <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">--}}
{{--                                   <a href="#" class="btn btn-success ml-1" data-toggle="modal" data-target="#subscriptionForm" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>--}}
{{--                               </div><!--btn-toolbar-->--}}
{{--                           </div><!--col-->--}}
{{--                       </div><!--row-->--}}
{{--                       <hr>--}}
                       <div class="col">
                           <div class="table-responsive">
                               <table class="table table-hover">
                                   <tr>
                                       <th>Today Subscription</th>
                                       <th>Current Month Subscription</th>
                                       <th>Total Subscription</th>
                                   </tr>

                                   <tr>
                                       {{--<td> {!! $today_suscription !!} TK</td>--}}
                                       {{--<td> {!! $current_suscription !!} TK</td>--}}
{{--                                        <td> {!! $expense !!} TK </td>--}}
                                   </tr>


                               </table>
                           </div>
                       </div><!--table-responsive-->

                       <div class="modal fade" id="subscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header text-center">
                                       <h4 class="modal-title w-100 font-weight-bold">Member Subscription</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   {{ html()->form('POST', route('member.log-in-out'))->class('form-horizontal')->open() }}
                                   <div class="modal-body">
                                       <div class="row">
                                           {{--                                            <div class="col-sm-12">--}}
                                           {{ html()->label('Date')->class('col-md-3 form-control-label required') }}
                                           {{ html()->date('subscription_date')
                                               ->class('form-control col-md-6')
                                               ->placeholder('Enter Date')
                                               ->required() }}
                                       </div>
                                       <br>
                                       <div class="row">

                                           {{ html()->label('Amount')->class('col-md-3 form-control-label required') }}
                                           {{ html()->text('log_in')
                                               ->class('form-control col-md-6')
                                               ->placeholder('Enter Subscription Amount')
                                               ->required() }}

                                           {{ form_submit(__('buttons.general.crud.create'))->class('form-control col-md-2 m-l-10') }}
                                        </div>

                                   </div>
                                   {{ html()->form()->close() }}
                               </div>
                           </div>
                       </div>

                   </div>
                   <div class="tab-pane" id="account" role="tabpanel">
                       <div class="col">
                           <div class="table-responsive">
                               <table class="table table-hover">
                                   <tr>
                                       <th>Sl</th>
                                       <th>Current Month Income</th>
                                       <th>Total Income</th>
                                   </tr>
                                   <tr>
                                       <td>1</td>
                                       <td>{!! $current_income !!} TK</td>
                                       <td>{!! $total_income !!} TK</td>
                                   </tr>
                               </table>
                           </div>
                       </div><!--table-responsive-->
                   </div>
                   <div class="tab-pane" id="library" role="tabpanel">
                       <div class="col">
                           <div class="table-responsive">
                           <table class="table table-hover">
                           <tr>
                               <th>SL</th>
                               <th>Book Name</th>
                               <th>Borrow Date</th>
                               <th>Return Status</th>
                               <th>Expected Return Date</th>
                               <th>Returned Date</th>
                           </tr>
                               <?php $i = 0; ?>
                               @foreach($books as $book)
                           <tr>
                                   <?php $i++ ?>
                                   <td>{!! $i !!}</td>
                                   <td>{!! $book->bookBorrowDetails->book->name !!}</td>
                                   <td>{!! $book->issue_date !!}</td>
                                   <td> @if($book->is_returned == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                   </td>
                                   <td>{!! $book->date_for_return !!}</td>
                                   <td>{!! isset($book->returned_date) ? $book->returned_date : '--' !!}</td>

                           </tr>
                               @endforeach
                           </table>
                           </div>
                       </div><!--table-responsive-->
                   </div>
                   <!--tab-->
               </div><!--tab-content-->
           </div><!--col-->
       </div><!--row-->
   </div><!--card-body-->

   <div class="card-footer">
       <div class="row">
           <div class="col">
               <small class="float-right text-muted">
                   <strong>@lang('labels.backend.access.users.tabs.content.overview.created_at'):</strong> {{ timezone()->convertToLocal($user->created_at) }} ({{ $user->created_at->diffForHumans() }}),
                   <strong>@lang('labels.backend.access.users.tabs.content.overview.last_updated'):</strong> {{ timezone()->convertToLocal($user->updated_at) }} ({{ $user->updated_at->diffForHumans() }})
                   @if($user->trashed())
                       <strong>@lang('labels.backend.access.users.tabs.content.overview.deleted_at'):</strong> {{ timezone()->convertToLocal($user->deleted_at) }} ({{ $user->deleted_at->diffForHumans() }})
                   @endif
               </small>
           </div><!--col-->
       </div><!--row-->
   </div><!--card-footer-->
</div><!--card-->
@endsection
