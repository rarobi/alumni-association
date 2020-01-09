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
                        {{ html()->label('Roll')->class('col-md-2 form-control-label required')->for('roll') }}

                        <div class="col-md-10">
                            {{ html()->text('roll')
                               ->class('form-control')
                               ->placeholder('Enter Your B.Sc roll')
                               ->attribute('maxlength', 14)
                               ->required()
                               ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Batch')->class('col-md-2 form-control-label')->for('batch') }}
                        <div class="col-md-10">
                            {{ html()->select('batch_id', $batches)
                                ->class('form-control')
                                ->placeholder("Select a batch")
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Session')->class('col-md-2 form-control-label required')->for('session') }}

                        <div class="col-md-10">
                            {{ html()->select('session', $sessions)
                                ->class('form-control')
                                ->placeholder("Select a session")
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Passing Year')->class('col-md-2 form-control-label required')->for('passing_year') }}

                        <div class="col-md-10">
                            {{ html()->text('passing_year')
                              ->class('form-control')
                              ->id('year')
                              ->placeholder("Enter Passing year (Ex. 2008)")
                              ->attribute('maxlength', 191)
                              ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Occupation')->class('col-md-2 form-control-label')->for('occupation') }}
                        <div class="col-md-10">
                            {{ html()->text('occupation')
                                ->class('form-control')
                                ->placeholder('Occupation')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Job Place')->class('col-md-2 form-control-label')->for('job_place') }}
                        <div class="col-md-10">
                            {{ html()->text('job_place')
                                ->class('form-control')
                                ->placeholder('Enter Job Place. ( Office Name / Business Area)')
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
                        {{ html()->label('Member Status')->class('col-md-2 form-control-label')->for('member_status') }}
                        <div class="col-md-10">
                            {{ html()->select('member_status')
                                ->options(['' => "Select Status", 'pending' => 'Pending', 'review' => 'Review', 'Approved' => 'Approved'])
                                ->class('form-control')
                                ->attribute('maxlength', 191) }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Image')->class('col-md-2 form-control-label')->for('image') }}
                        <div class="col-md-10">
                            <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                            <div>
                                <img src="{{ url('/img/backend/avatars/photo.png') }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                            </div>
                            <br>
                            <label class="btn btn-primary btn-sm">
                                <input onchange="changePhoto(this)" type="file" name="photo" style="display: none">
                                <i class="fa fa-image"></i> Upload photo
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('member.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
