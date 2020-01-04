@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('member.store'))->class('form-horizontal')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">Member Management <small class="text-muted">Create Member</small>
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
                            {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label required')->for('email') }}

                            <div class="col-md-10">
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.email'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label required')->for('password') }}

                            <div class="col-md-10">
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->id('password')
                                    ->placeholder(__('validation.attributes.backend.access.users.password'))
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label required')->for('password_confirmation') }}

                            <div class="col-md-10">
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->id('confirm_password')
                                    ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            {{ html()->label(__(''))->class('col-md-2 form-control-label')->for('password_confirmation') }}
                            <div class="col-md-10">
                                <span id='message'></span>
                            </div><!--col-->
                        </div><!--form-group-->

                        {{--<div class="form-group row">--}}
                            {{--{{ html()->label(__('labels.backend.access.users.table.abilities'))->class('col-md-2 form-control-label') }}--}}

                            {{--<div class="col-md-10">--}}
                                {{--<div class="table-responsive">--}}
                                    {{--<table class="table">--}}
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>@lang('labels.backend.access.users.table.roles')</th>--}}
                                            {{--<th>@lang('labels.backend.access.users.table.permissions')</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--@if($roles->count())--}}
                                                    {{--@foreach($roles as $role)--}}
                                                        {{--<div class="checkbox d-flex align-items-center">--}}
                                                            {{--{{ html()->label(--}}
                                                                            {{--html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)--}}
                                                                                  {{--->class('switch-input')--}}
                                                                                  {{--->id('role-'.$role->id)--}}
                                                                            {{--. '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')--}}
                                                                        {{--->class('switch switch-label switch-pill switch-primary mr-2')--}}
                                                                        {{--->for('role-'.$role->id) }}--}}
                                                            {{--{{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}--}}
                                                            {{--<label class="text-info"> &nbsp;--}}
                                                                {{--@if($role->id != 1)--}}
                                                                    {{--@if($role->permissions->count())--}}
                                                                        {{--@foreach($role->permissions as $permission)--}}
                                                                            {{--<i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}--}}
                                                                        {{--@endforeach--}}
                                                                    {{--@else--}}
                                                                        {{--@lang('labels.general.none')--}}
                                                                    {{--@endif--}}
                                                                {{--@else--}}
                                                                    {{--<i class="fas fa-dot-circle"></i> All Permission--}}
                                                                {{--@endif--}}
                                                            {{--</label>--}}
                                                        {{--</div>--}}
                                                    {{--@endforeach--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--@if($permissions->count())--}}
                                                    {{--@foreach($permissions as $permission)--}}
                                                        {{--<div class="checkbox d-flex align-items-center">--}}
                                                            {{--{{ html()->label(--}}
                                                                    {{--html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)--}}
                                                                          {{--->class('switch-input')--}}
                                                                          {{--->id('permission-'.$permission->id)--}}
                                                                        {{--. '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')--}}
                                                                    {{--->class('switch switch-label switch-pill switch-primary mr-2')--}}
                                                                {{--->for('permission-'.$permission->id) }}--}}
                                                            {{--{{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}--}}
                                                        {{--</div>--}}
                                                    {{--@endforeach--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div><!--col-->--}}
                        {{--</div><!--form-group-->--}}

                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
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

