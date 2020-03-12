@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('settings.alumni.archive.store'))->attribute('enctype','multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Archive List <small class="text-muted">Create Archive</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row tranx_id">
                        {{ html()->label('Name')->class('col-md-2 form-control-label required')->for('name') }}
                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Enter Name')
                                ->attribute('maxlength', 200)
                                ->required()
                                ->autofocus() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Designation')->class('col-md-2 form-control-label required')->for('designation') }}
                        <div class="col-md-10">
                            {{ html()->select('designation')
                                ->class('form-control payment')
                                ->options(['' => 'select an option', 'president' => 'PRESIDENT', 'vice-president' => 'VICE - PRESIDENT', 'general secretary' => 'GENERAL SECRETARY', 'treasurer' => 'TREASURER', 'assistant general secretary' => 'ASSISTANT GENERAL SECRETARY'])
                                ->required()
                                }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label('Batch')->class('col-md-2 form-control-label required')->for('batch') }}
                        <div class="col-md-10">
                            {{ html()->select('batch', $batches)
                                ->placeholder("Select a batch")
                                ->class('form-control payment')
                                ->required()
                                }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row branch-box">
                        {{ html()->label('Session')->class('col-md-2 form-control-label required')->for('session') }}
                        <div class="col-md-10">
                            {{ html()->select('session', $sessions)
                                ->placeholder("Select a session")
                                ->class('form-control')
                                ->attribute('maxlength', 20)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row branch-box">
                        {{ html()->label('Elected Years')->class('col-md-2 form-control-label required')->for('elected-years') }}
                        <div class="col-md-10">
                            {{ html()->text('elected_years')
                               ->class('form-control')
                               ->placeholder('Enter Elected Years [Ex. 2020-2021]')
                               ->attribute('maxlength', 20)
                               ->required()
                               ->autofocus() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row branch-box">
                        {{ html()->label('Is Published')->class('col-md-2 form-control-label required')->for('is_published') }}
                        <div class="col-md-10">
                            {{ html()->checkbox('is_published') }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row document">
                        {{ html()->label('Image')->class('col-md-2 form-control-label required')->for('image') }}
                        <div class="col-md-10">
                            <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                            <div>
                                <img src="{{ url('/img/backend/avatars/photo.png') }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                            </div>
                            <br>
                            <label class="btn btn-primary btn-sm">
                                <input onchange="changePhoto(this)" type="file" name="image" style="display: none">
                                <i class="fa fa-image"></i> Upload Image
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
            <hr>
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('payment.index'), __('buttons.general.cancel')) }}
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
//        $( document ).ready(function() {
            $('.payment').on('change', function() {
                var payment_option = this.value;
                if(payment_option == 'bkash' || payment_option == 'rocket' || payment_option == 'nogod'){
                    $('.tranx_id').show();
                    $('.sender').show();
                    $('.branch-box').hide();
                    $('.document').show();

                } else if(payment_option == 'bank') {
                    $('.branch-box').show();
                    $('.tranx_id').hide();
                    $('.sender').hide();
                    $('.document').hide();
                }
            });

            $('#date').datepicker({
                format: "Y-m-d",
                changeMonth: true,
                changeYear: true,
            });
//        });
        // $('#confirm_password').on('keyup', function () {
        //     if ($('#password').val() == $('#confirm_password').val()) {
        //         $('#message').html('Matched').css('color', 'green');
        //     } else
        //         $('#message').html('Not Matched').css('color', 'red');
        // });



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
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

