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
{{--{!! dd($user) !!}--}}
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Name')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name', $user->first_name)
                                ->class('form-control')
                                ->placeholder('Name')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Mobile')->class('col-md-2 form-control-label')->for('mobile') }}

                        <div class="col-md-10">
                            {{ html()->text('mobile', $user->mobile)
                                ->class('form-control')
                                ->placeholder('Mobile')
                                ->attribute('maxlength', 191)
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Educational qualification')->class('col-md-2 form-control-label')->for('educational_qualification') }}
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

                    <div class="form-group row">
                        {{ html()->label('Roll')->class('col-md-2 form-control-label')->for('roll') }}

                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                            {{ html()->text('roll', $user->profile->roll)
                               ->class('form-control')
                               ->placeholder('Enter Your B.Sc roll')
                               ->attribute('maxlength', 14)
                               ->autofocus() }}
                             @else
                                    {{ html()->text('roll')
                                       ->class('form-control')
                                       ->placeholder('Enter Your B.Sc roll')
                                       ->attribute('maxlength', 14)
                                       ->autofocus() }}
                             @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Batch')->class('col-md-2 form-control-label')->for('batch') }}
                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                            {{ html()->select('batch_id',$user->profile->batch_id )
                                ->options($batches)
                                ->class('form-control')
                                ->placeholder("Select a batch")
                                ->attribute('maxlength', 191) }}
                             @else
                                {{ html()->select('batch_id' )
                                    ->options($batches)
                                    ->class('form-control')
                                    ->placeholder("Select a batch")
                                    ->attribute('maxlength', 191) }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Session')->class('col-md-2 form-control-label')->for('session') }}

                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                            {{ html()->select('session', $user->profile->session)
                                ->class('form-control')
                                 ->options($sessions)
                                ->placeholder("Select a session")
                                ->attribute('maxlength', 191)
                                 }}
                            @else
                                {{ html()->select('session')
                                    ->class('form-control')
                                    ->options($sessions)
                                    ->placeholder("Select a session")
                                    ->attribute('maxlength', 191)
                                     }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Passing Year')->class('col-md-2 form-control-label')->for('passing_year') }}

                        <div class="col-md-10">
                            @if(!is_null($user->profile))
                            {{ html()->text('passing_year', $user->profile->passing_year)
                              ->class('form-control')
                              ->id('year')
                              ->placeholder("Enter Passing year (Ex. 2008)")
                              ->attribute('maxlength', 191)
                              }}
                            @else
                                {{ html()->text('passing_year')
                                  ->class('form-control')
                                  ->id('year')
                                  ->placeholder("Enter Passing year (Ex. 2008)")
                                  ->attribute('maxlength', 191)
                                  }}
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->

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
                        {{ html()->label('Job Position')->class('col-md-2 form-control-label')->for('occupation') }}
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
                        {{ html()->label('Present Address')->class('col-md-2 form-control-label')->for('present_address') }}
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
                        {{ html()->label('Permanent Address')->class('col-md-2 form-control-label')->for('permanent_address') }}
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
                        {{ html()->label('Blood Group')->class('col-md-2 form-control-label')->for('blood_group') }}
                        <div class="col-md-10">
                            {{ html()->select('blood_group', $user->blood_group)
                                ->options(['' => "Select Blood Group", 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+' , 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'])
                                ->class('form-control')
                                ->placeholder('Blood Group')
                                ->attribute('maxlength', 191)
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Date of Birth')->class('col-md-2 form-control-label dob')->for('nid') }}
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
{{--                    <div class="form-group row">--}}
{{--                        {{ html()->label('Member Status')->class('col-md-2 form-control-label')->for('member_status') }}--}}
{{--                        <div class="col-md-10">--}}
{{--                            {{ html()->select('member_status')--}}
{{--                                ->options(['' => "Select Status", 'pending' => 'Pending', 'review' => 'Review', 'Approved' => 'Approved'])--}}
{{--                                ->class('form-control')--}}
{{--                                ->attribute('maxlength', 191) }}--}}
{{--                        </div><!--col-->--}}
{{--                    </div><!--form-group-->--}}
                    <div class="form-group row">
                        {{ html()->label('Image')->class('col-md-2 form-control-label')->for('image') }}
                        <div class="col-md-10">
                            <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                            <div>
                                @if(!is_null($user->profile) && !is_null($user->profile->image))
                                    <img src="/uploads/member_profile/{{ $user->profile->image }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                @else
                                    <img src="{{ url('/img/backend/avatars/photo.png') }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                @endif
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
@section('footer-script')
    <script type="text/javascript">
        $('#confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matched').css('color', 'green');
            } else
                $('#message').html('Not Matched').css('color', 'red');
        });

        function changePhoto(input) {
            if (input.files && input.files[0]) {
                $("#photo_err").html('');
                var mime_type = input.files[0].type;
                if(!(mime_type=='image/jpeg' || mime_type=='image/jpg' || mime_type=='image/png')){
                    $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profilePhotoViewer').attr('src', e.target.result);
                    // console.dir(e);
                    // console.dir(e.target);
                    // console.dir(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
