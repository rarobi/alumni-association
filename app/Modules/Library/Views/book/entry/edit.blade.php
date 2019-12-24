@extends('backend.layouts.app')

@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
        {{ html()->form('PATCH', route('library.book.entry.update',$book->id))->attribute('enctype','multipart/form-data')->class('form-horizontal')->open() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">Library Management <small class="text-muted">Edit Book</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Name')->class('col-md-2 form-control-label required') }}

                            <div class="col-md-10">
                                {{ html()->text('name', $book->name)
                                    ->class('form-control')
                                    ->placeholder('Enter Name')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Writer Name')->class('col-md-2 form-control-label required') }}

                            <div class="col-md-10">
                                {{ html()->select('writer_id', $writers , $book->writer_name)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Category Name')->class('col-md-2 form-control-label required')->for('mobile') }}

                            <div class="col-md-10">
                                {{ html()->select('category_id', $categories, $book->category_name)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Code')->class('col-md-2 form-control-label required')->for('code') }}
                            <div class="col-md-10">
                                {{ html()->text('code', $book->code)
                                    ->class('form-control')
                                    ->placeholder('Enter Code')
                                    ->attribute('maxlength', 20)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Price')->class('col-md-2 form-control-label required')->for('price') }}
                            <div class="col-md-10">
                                {{ html()->input('number','price', $book->price)
                                    ->class('form-control')
                                    ->placeholder('Amount')
                                    ->attribute('maxlength', 20)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Summery')->class('col-md-2 form-control-label')->for('summery') }}
                            <div class="col-md-10">
                                {{ html()->textarea('summery', $book->summary)
                                    ->attribute('rows', 5)
                                    ->class('form-control')
                                    ->placeholder('Write summery') }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Stock Quantity')->class('col-md-2 form-control-label required')->for('stock_quantity') }}
                            <div class="col-md-10">
                                {{ html()->input('number','stock_quantity',$book->stock_quantity)
                                    ->class('form-control')
                                    ->placeholder('Enter stock quantity')
                                    ->attribute('maxlength', 3)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Status')->class('col-md-2 form-control-label required')->for('status') }}
                            <div class="col-md-10">
                                <select name="status" class="span6 typeahead form-control">
                                    <option>Select one</option>
                                    <option value="1" <?php echo ($book['status'] == 1)?'selected="true"':''; ?>>Active</option>
                                    <option value="0" <?php echo ($book['status'] == 0)?'selected="true"':''; ?>>Inactive</option>
                                </select>
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            {{ html()->label('Cover Photo')->class('col-md-2 form-control-label required')->for('status') }}
                            <input type="hidden" name="photo" value="{{ $book->photo }}">
                            <div class="col-md-10">
                                <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>
                                <div>
                                    @if(!empty($book->photo))
                                        <img id="profilePhotoViewer" class="img img-responsive img-thumbnail" src="{{ url('/uploads/books/'.$book->photo) }}" height="150" width="130" style="border-radius: 10px;" alt="">
                                    @else
                                        <img id="profilePhotoViewer" class="img img-responsive img-thumbnail" src="{{ url('/img/backend/avatars/photo.png') }}" height="150" width="130" alt="" style="border-radius: 10px;">
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
                    <div class="col text-right">
                        <a href="{{ route('library.book.entry.index') }}" class="btn btn-danger btn-sm float-left">Cancel</a>
                        {{ form_submit(__('buttons.general.crud.update')) }}
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



