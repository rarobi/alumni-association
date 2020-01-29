@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('settings.alumni.change-password.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Password Management<small class="text-muted"> Change Password </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Current Password')->class('col-md-2 form-control-label')->for('current_password') }}
                        <div class="col-md-10">
                            {{ html()->text('current_password')
                                ->class('form-control')
                                ->placeholder('Enter current password')
                                ->attribute('maxlength', 20)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('New Password')->class('col-md-2 form-control-label')->for('new_password') }}
                        <div class="col-md-10">
                            {{ html()->password('new_password')
                                ->class('form-control')
                                ->id('password')
                                ->placeholder("Enter new password")
                                ->attribute('maxlength', 191)
                                ->required()
                                 }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ html()->label('Confirm Password')->class('col-md-2 form-control-label')->for('confirm_password') }}
                        <div class="col-md-10">
                            {{ html()->password('confirm_password')
                                ->class('form-control')
                                ->id('confirm_password')
                                ->placeholder("Enter confirm password")
                                ->attribute('maxlength', 191)
                                ->required()
                                 }}

                            <p id="message" class="m-t-5"></p>
                        </div>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
{{--                    {{ form_cancel(route('settings.alumni.change-password'), __('buttons.general.cancel')) }}--}}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
@section('footer-script')
    <script type="text/javascript">
         $('#confirm_password').on('keyup', function () {
             if ($('#password').val() == $('#confirm_password').val()) {
                 $('#message').html('Matched').css('color', 'green');
             } else
                 $('#message').html('Not Matched').css('color', 'red');
         });

    </script>

@endsection

