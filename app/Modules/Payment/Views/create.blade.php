@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('payment.store'))->attribute('enctype','multipart/form-data')->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Payment List <small class="text-muted">Create Payment</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label('Payment Type')->class('col-md-2 form-control-label required')->for('payment') }}
                        <div class="col-md-10">
                            {{ html()->select('paymemt_type')
                                ->class('form-control payment')
                                ->options(['' => 'select an option', 'bkash' => 'Bkash', 'rocket' => 'Rocket', 'nogod' => 'Nogod', 'bank' => 'Bank Transfer'])
                                ->required()
                                }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row tranx_id">
                        {{ html()->label('Tranx ID')->class('col-md-2 form-control-label')->for('tranx_id') }}
                        <div class="col-md-10">
                            {{ html()->text('transaction_id')
                                ->class('form-control')
                                ->placeholder('Enter transaction numbr')
                                ->attribute('maxlength', 20)
                                ->autofocus() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row sender">
                        {{ html()->label('Transaction Number')->class('col-md-2 form-control-label')->for('transaction_number') }}
                        <div class="col-md-10">
                            {{ html()->text('transaction_number')
                                ->class('form-control')
                                ->id('sender')
                                ->placeholder("Enter Transaction Mobile Number")
                                ->attribute('maxlength', 191)
                                 }}
                        </div>
                    </div>
                    <div class="form-group row branch-box">
                        {{ html()->label('Branch Name')->class('col-md-2 form-control-label')->for('branch_name') }}
                        <div class="col-md-10">
                            {{ html()->text('branch_name')
                                ->class('form-control ')
                                ->placeholder('Enter branch name') }}
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Payment Date')->class('col-md-2 form-control-label required')->for('payment_date') }}
                        <div class="col-md-10">
                            {{ html()->text('payment_date')
                                ->class('form-control')
                                ->id('date')
                                ->placeholder("Enter Payment date")
                                ->attribute('maxlength', 191)
                                 ->required()}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ html()->label('Document')->class('col-md-2 form-control-label required')->for('document') }}
                        <div class="col-md-10">
                            <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                            <div>
                                <img src="{{ url('/img/backend/avatars/photo.png') }}" id="profilePhotoViewer" width="150" height="150" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                            </div>
                            <br>
                            <label class="btn btn-primary btn-sm">
                                <input onchange="changePhoto(this)" type="file" name="document" style="display: none">
                                <i class="fa fa-image"></i> Upload document
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

                } else if(payment_option == 'bank') {
                    $('.branch-box').show();
                    $('.tranx_id').hide();
                    $('.sender').hide();
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

