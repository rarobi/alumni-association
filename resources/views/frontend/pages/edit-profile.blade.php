@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Edit Profile</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="bg-gray p-t-70">
        <div class="container">
            {{ html()->form('POST', url('/profile/update', $user->id))->class('form-horizontal')->open() }}
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Name')->class('col-md-2 form-control-label required')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name', $user->first_name)
                                ->class('form-control')
                                ->placeholder('Name')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Mobile')->class('col-md-2 form-control-label required')->for('mobile') }}

                        <div class="col-md-10">
                            {{ html()->text('mobile', $user->mobile)
                                ->class('form-control')
                                ->placeholder('Mobile')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Educational qualification')->class('col-md-2 form-control-label required')->for('educational_qualification') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->Select('educational_qualification', $user->profile->education_qualification)
                                    ->class('form-control')
                                    ->options(['' => "Select a degree", 'B.Sc(Engineering)' => 'B.Sc(Engineering)', 'M.Sc(Engineering)' => 'M.Sc(Engineering)', 'PhD' => 'PhD'])
                                    ->attribute('maxlength', 191)
                                     }}
                            @else
                                {{ html()->Select('educational_qualification')
                                    ->class('form-control')
                                    ->options(['' => "Select a degree", 'B.Sc(Engineering)' => 'B.Sc(Engineering)', 'M.Sc(Engineering)' => 'M.Sc(Engineering)', 'PhD' => 'PhD'])
                                    ->attribute('maxlength', 191)
                                     }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    {{--<div class="form-group row">--}}
                    {{--{{ html()->label('Roll')->class('col-md-2 form-control-label required')->for('roll') }}--}}

                    {{--<div class="col-md-10">--}}
                    {{--{{ html()->text('roll')--}}
                    {{--->class('form-control')--}}
                    {{--->placeholder('Enter Your B.Sc roll')--}}
                    {{--->attribute('maxlength', 14)--}}
                    {{--->required()--}}
                    {{--->autofocus() }}--}}
                    {{--</div><!--col-->--}}
                    {{--</div><!--form-group-->--}}
                    {{--<div class="form-group row">--}}
                    {{--{{ html()->label('Batch')->class('col-md-2 form-control-label')->for('batch') }}--}}
                    {{--<div class="col-md-10">--}}
                    {{--{{ html()->select('batch_id', $batches)--}}
                    {{--->class('form-control')--}}
                    {{--->placeholder("Select a batch")--}}
                    {{--->attribute('maxlength', 191) }}--}}
                    {{--</div><!--col-->--}}
                    {{--</div><!--form-group-->--}}
                    {{--<div class="form-group row">--}}
                    {{--{{ html()->label('Session')->class('col-md-2 form-control-label required')->for('session') }}--}}

                    {{--<div class="col-md-10">--}}
                    {{--{{ html()->select('session', $sessions)--}}
                    {{--->class('form-control')--}}
                    {{--->placeholder("Select a session")--}}
                    {{--->attribute('maxlength', 191)--}}
                    {{--->required() }}--}}
                    {{--</div><!--col-->--}}
                    {{--</div><!--form-group-->--}}
                    {{--<div class="form-group row">--}}
                    {{--{{ html()->label('Passing Year')->class('col-md-2 form-control-label required')->for('passing_year') }}--}}

                    {{--<div class="col-md-10">--}}
                    {{--{{ html()->text('passing_year')--}}
                    {{--->class('form-control')--}}
                    {{--->id('year')--}}
                    {{--->placeholder("Enter Passing year (Ex. 2008)")--}}
                    {{--->attribute('maxlength', 191)--}}
                    {{--->required() }}--}}
                    {{--</div><!--col-->--}}
                    {{--</div><!--form-group-->--}}

                    <div class="form-group row">
                        {{ html()->label('Occupation')->class('col-md-2 form-control-label')->for('occupation') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('occupation', $user->profile->occupation)
                                    ->class('form-control')
                                    ->placeholder('Enter your current occupation')
                                    ->attribute('maxlength', 191) }}
                            @else
                                {{ html()->text('occupation')
                                    ->class('form-control')
                                    ->placeholder('Enter your current occupation')
                                    ->attribute('maxlength', 191) }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Job Place')->class('col-md-2 form-control-label')->for('job_place') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('job_place', $user->profile->job_place)
                                    ->class('form-control')
                                    ->placeholder('Enter Job Place. ( Office Name / Business Area)')
                                    ->attribute('maxlength', 191) }}
                            @else
                                {{ html()->text('job_place')
                                    ->class('form-control')
                                    ->placeholder('Enter Job Place. ( Office Name / Business Area)')
                                    ->attribute('maxlength', 191) }}
                            @endif

                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Job Position')->class('col-md-2 form-control-label')->for('job_position') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('job_position', $user->profile->job_position)
                                    ->class('form-control')
                                    ->placeholder('Job Position')
                                    ->attribute('maxlength', 191) }}
                            @else
                                {{ html()->text('job_position')
                                    ->class('form-control')
                                    ->placeholder('Job Position')
                                    ->attribute('maxlength', 191) }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Present Address')->class('col-md-2 form-control-label required')->for('present_address') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('present_address', $user->profile->present_address)
                                    ->class('form-control')
                                    ->placeholder('Present Address')
                                    ->attribute('maxlength', 191)
                                    }}
                            @else
                                {{ html()->text('present_address')
                                    ->class('form-control')
                                    ->placeholder('Present Address')
                                    ->attribute('maxlength', 191)
                                    }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Permanent Address')->class('col-md-2 form-control-label required')->for('permanent_address') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('permanent_address', $user->profile->parmanent_address)
                                    ->class('form-control')
                                    ->placeholder('Permanent Address')
                                    ->attribute('maxlength', 191)
                                    }}
                            @else
                                {{ html()->text('permanent_address')
                                    ->class('form-control')
                                    ->placeholder('Permanent Address')
                                    ->attribute('maxlength', 191)
                                    }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Blood Group')->class('col-md-2 form-control-label required')->for('blood_group') }}
                        <div class="col-md-10">
                            {{ html()->select('blood_group', $user->blood_group)
                                ->options(['' => "Select Blood Group", 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+' , 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'])
                                ->class('form-control')
                                ->attribute('maxlength', 191)
                                }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Date of Birth')->class('col-md-2 form-control-label required dob')->for('nid') }}
                        <div class="col-md-10">
                            {{ html()->date('dob', $user->dob)
                                ->class('form-control')
                                ->placeholder('Enter date')}}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('NID Number')->class('col-md-2 form-control-label')->for('nid') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                                {{ html()->text('nid', $user->profile->nid)
                                    ->class('form-control')
                                    ->placeholder('NID Number')
                                    ->attribute('maxlength', 191) }}
                            @else
                                {{ html()->text('nid')
                                    ->class('form-control')
                                    ->placeholder('NID Number')
                                    ->attribute('maxlength', 191) }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    {{--<div class="form-group row">--}}
                    {{--{{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label required')->for('email') }}--}}

                    {{--<div class="col-md-10">--}}
                    {{--{{ html()->email('email')--}}
                    {{--->class('form-control')--}}
                    {{--->placeholder(__('validation.attributes.backend.access.users.email'))--}}
                    {{--->attribute('maxlength', 191)--}}
                    {{--->required() }}--}}
                    {{--</div><!--col-->--}}
                    {{--</div><!--form-group-->--}}
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('member.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col--><br><br>
            </div><!--row-->
            {{ html()->form()->close() }}
        </div>
    </section>
@endsection