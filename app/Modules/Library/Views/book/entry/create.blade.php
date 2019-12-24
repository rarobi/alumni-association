@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('library.book.entry.store'))->attribute('enctype','multipart/form-data')->class('form-horizontal')->open() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">Library Management <small class="text-muted">Create Book</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Name')->class('col-md-2 form-control-label required') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder('Enter Name')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Publisher Name')->class('col-md-2 form-control-label required') }}

                            <div class="col-md-10">
                                {{ html()->select('publisher_id', $publishers)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Writer Name')->class('col-md-2 form-control-label required') }}

                            <div class="col-md-10">
                                {{ html()->select('writer_id', $writers)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label('Category Name')->class('col-md-2 form-control-label required')->for('mobile') }}

                            <div class="col-md-10">
                                {{ html()->select('category_id', $categories)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->


                        <div class="form-group row">
                        {{ html()->label('Code')->class('col-md-2 form-control-label required')->for('code') }}
                            <div class="col-md-10">
                                {{ html()->text('code')
                                    ->class('form-control')
                                    ->placeholder('Enter Code')
                                    ->attribute('maxlength', 20)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                        {{ html()->label('Price')->class('col-md-2 form-control-label required')->for('price') }}
                            <div class="col-md-10">
                                {{ html()->input('number','price')
                                    ->class('form-control')
                                    ->placeholder('Amount')
                                    ->attribute('maxlength', 20)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Summery')->class('col-md-2 form-control-label required')->for('summery') }}
                            <div class="col-md-10">
                                {{ html()->textarea('summery')
                                    ->attribute('rows', 5)
                                    ->class('form-control')
                                    ->placeholder('Write summery') }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Stock Quantity')->class('col-md-2 form-control-label required')->for('stock_quantity') }}
                            <div class="col-md-10">
                                {{ html()->input('number','stock_quantity')
                                    ->class('form-control')
                                    ->placeholder('Enter stock quantity')
                                    ->attribute('maxlength', 3)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Status')->class('col-md-2 form-control-label required')->for('status') }}
                            <div class="col-md-10">
                                {{ html()->select('status')
                                    ->options(['' => "Select status", '1' => 'Active', '0' => 'Inactive'])
                                    ->class('form-control')
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="row form-group">
                            {{ html()->label('Cover Photo')->class('col-md-2 form-control-label required')->for('status') }}
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
                            </div>
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row">
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

