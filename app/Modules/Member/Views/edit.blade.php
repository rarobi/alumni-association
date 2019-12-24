@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($user, 'PATCH', route('member.update', $user->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Member Management
                        <small class="text-muted">Edit Member</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Name')->class('col-md-2 form-control-label required')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Name')
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('নাম')->class('col-md-2 form-control-label required')->for('name_bn') }}

                        <div class="col-md-10">
                            {{ html()->text('name_bn')
                                ->class('form-control')
                                ->placeholder('নাম (বাংলায়)')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Mobile')->class('col-md-2 form-control-label required')->for('mobile') }}

                        <div class="col-md-10">
                            {{ html()->text('mobile')
                                ->class('form-control')
                                ->placeholder('Mobile')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Educational qualification')->class('col-md-2 form-control-label required')->for('educational_qualification') }}
                        <div class="col-md-10">
                            {{ html()->text('educational_qualification')
                                ->class('form-control')
                                ->placeholder('Educational qualification')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Present Job')->class('col-md-2 form-control-label')->for('occupation') }}
                        <div class="col-md-10">
                            {{ html()->text('occupation')
                                ->class('form-control')
                                ->placeholder('Occupation')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Job Position')->class('col-md-2 form-control-label')->for('occupation') }}
                        <div class="col-md-10">
                            {{ html()->text('job_position')
                                ->class('form-control')
                                ->placeholder('Job Position')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Present Address')->class('col-md-2 form-control-label required')->for('present_address') }}
                        <div class="col-md-10">
                            {{ html()->text('present_address')
                                ->class('form-control')
                                ->placeholder('Present Address')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Permanent Address')->class('col-md-2 form-control-label required')->for('permanent_address') }}
                        <div class="col-md-10">
                            {{ html()->text('permanent_address')
                                ->class('form-control')
                                ->placeholder('Permanent Address')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Blood Group')->class('col-md-2 form-control-label required')->for('blood_group') }}
                        <div class="col-md-10">
                            {{ html()->select('blood_group')
                                ->options(['' => "Select Blood Group", 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+' , 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'])
                                ->class('form-control')
                                ->placeholder('Blood Group')
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Date of Birth')->class('col-md-2 form-control-label required dob')->for('nid') }}
                        <div class="col-md-10">
                            {{ html()->date('dob')
                                ->class('form-control')
                                ->placeholder('Enter date')}}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('NID Number')->class('col-md-2 form-control-label')->for('nid') }}
                        <div class="col-md-10">
                            {{ html()->text('nid')
                                ->class('form-control')
                                ->placeholder('NID Number')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Passport Number')->class('col-md-2 form-control-label')->for('passport') }}
                        <div class="col-md-10">
                            {{ html()->text('passport')
                                ->class('form-control')
                                ->placeholder('Passport Number')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
