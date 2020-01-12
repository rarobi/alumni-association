@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('PATCH', route('certification.update', $certification->id))->attribute('enctype','multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Certification List <small class="text-muted">Edit Certification</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Name')->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name', $certification->name)
                                ->class('form-control')
                                ->placeholder('Enter Name')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Company')->class('col-md-2 form-control-label')->for('company') }}

                        <div class="col-md-10">
                            {{ html()->text('company', $certification->job_place)
                                ->class('form-control')
                                ->placeholder('Enter Company name')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Designation')->class('col-md-2 form-control-label')->for('designation') }}

                        <div class="col-md-10">
                            {{ html()->text('designation', $certification->designation)
                                ->class('form-control')
                                ->placeholder('Enter designation')
                                ->attribute('maxlength', 191)
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Quotes')->class('col-md-2 form-control-label')->for('details') }}

                        <div class="col-md-10">
                            {{ html()->textarea('quote', $certification->description)
                                ->attribute('rows', 5)
                                ->class('form-control')
                                 ->placeholder('Write Details.....')
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Event Photo')->class('col-md-2 form-control-label')->for('image') }}
                        <div class="col-md-10">
                            <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                            <div>
                                @if($certification->image)
                                <img src="/uploads/certification_photo/{{ $certification->image }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
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
                    {{ form_cancel(route('certification.index'), __('buttons.general.cancel')) }}
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

