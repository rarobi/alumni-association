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
                        <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-user"></i> Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#in-out" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-calendar-check"></i> Educational Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#subscription" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-briefcase"></i> Professional Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#payment" role="tab" aria-controls="overview" aria-expanded="true"><i class="fas fa-money-bill"></i> Payment Info</a>
                    </li>
                </ul>
                <div class="tab-content">
                   <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                        <div class="row">
                            <div class="offset-sm-5 col-sm-7">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')" style="margin: 0px 15px 3px 0px" >
                                    @if($logged_in_user->isAdmin())
                                    <a href="{!! route('member.edit',$user->id) !!}" class="btn btn-primary ml-1" data-toggle="tooltip" title="Edit Member"><i class="fas fa-edit"></i></a>
{{--                                    <a href="" class="btn btn-primary ml-1" data-toggle="tooltip" title="Edit Member"><i class="fas fa-edit"></i></a>--}}
                                    @endif
                                </div><!--btn-toolbar-->
                            </div><!--col-->
                        </div><!--row-->
{{--                        <hr>--}}
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->first_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Email Address</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>{!! $user->member_status!!}</td>
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
                                        <th>Present Address</th>
                                        <td>
                                            @if($user->profile && $user->profile->present_address)
                                                {{ $user->profile->present_address}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Permanent Address</th>
                                        <td>
                                            @if($user->profile && $user->profile->parmanent_address)
                                                {{$user->profile->parmanent_address }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>NID Number</th>
                                        <td>
                                            @if($user->profile && $user->profile->nid)
                                                {{ $user->profile->nid}}
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
                                       <th>Institute</th>
                                       <td>NSTU</td>
                                   </tr>
                                   <tr>
                                       <th>Department</th>
                                       <td>CSTE</td>
                                   </tr>
                                   <tr>
                                       <th>Batch</th>
                                       <td>{!! isset($user->profile->batch_id) ? $user->profile->batch_id : 'N/A' !!}</td>
                                   </tr>
                                   <tr>
                                       <th>Sesson</th>
                                       <td>{!! isset($user->profile->session) ? $user->profile->session : 'N/A' !!} </td>
                                   </tr>
                                   <tr>
                                       <th>B.Sc Roll</th>
                                       <td>{!! isset($user->profile->roll) ? $user->profile->roll : 'N/A' !!} </td>
                                   </tr>
                                   <tr>
                                       <th>Passing Year</th>
                                       <td>{!! isset($user->profile->passing_year) ? $user->profile->passing_year : 'N/A' !!} </td>
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
                                       <th>Occupation</th>
                                       <td>{!! isset($user->profile->occupation) ? $user->profile->occupation : 'N/A' !!} </td>
                                   </tr>
                                   <tr>
                                       <th>Job Place</th>
                                       <td> {!! isset($user->profile->job_place) ? $user->profile->job_place : 'N/A' !!} </td>
                                   </tr>
                                   <tr>
                                       <th>Job Position</th>
                                       <td> {!! isset($user->profile->job_position) ? $user->profile->job_position : 'N/A' !!} </td>
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
                    <div class="tab-pane" id="payment" role="tabpanel">
                        <div class="col">
{{--                            {!! dd($user->payment) !!}--}}
                            @if(!is_null($user->payment))
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Payment Type</th>
                                        <td>{!! isset($user->payment->payment_type) ? $user->payment->payment_type : 'N/A' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <td>{!! isset($user->payment->transaction_id) ? $user->payment->transaction_id : 'N/A' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Mobile Number</th>
                                        <td>{!! isset($user->payment->transaction_number) ? $user->payment->transaction_number : 'N/A' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Branch Name</th>
                                        <td>{!! isset($user->payment->branch_name) ? $user->payment->branch_name : 'N/A' !!} </td>
                                    </tr>
                                    <tr>
                                        <th>Payment Date</th>
                                        <td>{!! isset($user->payment->payment_date) ? $user->payment->payment_date : 'N/A' !!} </td>
                                    </tr>
                                    <tr>
                                        <th>Document</th>
                                        <td>
                                            <img src="/uploads/payment_documents/{{ $user->payment->document }}" height="200" width="300">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            @else
                            <div class="row">
                                <p class="text-center"> No Data Found</p>
                            </div>
                            @endif
                        </div><!--table-responsive-->
                    </div>
                   <!--tab-->
               </div><!--tab-content-->
           </div><!--col-->
       </div><!--row-->
        @if(($user->member_status != "approved") ||  ($user->member_status == "reviewed"))
        <div class="row">
            <div class="col-sm-10">
                <a class="btn btn-info" href="{!! route('member.accept', $user->id) !!}"> Approve Member</a>
            </div>
            <div class="col-sm-2 pull-right">
                <a class="btn btn-warning " href="{{ url()->previous() }}"><i class="fa fa-arrow-left"> Back</i></a>
            </div>
        </div>
        @endif
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
