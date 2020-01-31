@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Profile</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->
{{--    {!! dd($user) !!}--}}
    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4" id="sidebar">
                            <div class="box_profile">
                                <form id="uploadimage" method="post"  enctype="multipart/form-data">
                                <figure>
                                    @if(!is_null($user->profile) && !is_null($user->profile->image))
                                    <img class="thumbnail-image" src="/uploads/member_profile/{{ $user->profile->image }}" alt="" style="height:190px">
                                    @else
                                        <img class="thumbnail-image" src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height:190px">
                                    @endif
                                        <div class="edit">
                                        <label for="user-profile-image">
                                            <input type="file" name="image_path" multiple class="file thumbnail-file" id="user-profile-image" accept="image/*" style="display: none;">
                                            <i class="fa fa-camera fa-2x"></i>
                                        </label>
                                    </div>
                                    <input type="submit" value="Submit" id="submit-button" style="display: none;">

                                    <div id="progress" class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-primary"></div>
                                    </div>
{{--                                    <h1>{!! $user->first_name !!}</h1>--}}
                                </figure>
                                </form>
                            </div>
                        </aside>
                        <!-- /asdide -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="tabs_styled_2">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true">General info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book">Educational Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Job Info</a>
                                    </li>
                                </ul>
                                <!--/nav-tabs -->
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
                                        <div class="indent_title_in1">
                                            <i class="pe-7s-news-paper"></i>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <h3>Educational Statement</h3>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#educationForm" data-toggle="tooltip" title="Add Degree"><i class="fa fa-plus-circle"> </i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p><b>Institute:</b> Noakhali Science & Technology University</p>
                                            <p><b>Department:</b> CSTE</p>
                                            <p><b>Batch:</b> {!! isset($user->profile->batch_id) ? $user->profile->batch_id : 'Not Provided'  !!}</p>
                                            <p><b>Session:</b> {!! isset($user->profile->session) ? $user->profile->session : 'Not Provided' !!}</p>

                                        </div> </div>
                                    <!-- /tab_1 -->
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div class="indent_title_in1">
                                            <i class="pe-7s-user"></i>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <h3>Personal Statement</h3>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="{!! url('/profile/edit', $user->id) !!}" class="btn btn-primary" data-toggle="tooltip" title="Edit Profile"><i class="fa fa-edit"> </i></a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="wrapper_indent">
                                            <p><b>Name:</b> {!! $user->first_name !!}</p>
                                            <p><b>Age:</b> Not Provided</p>
                                            <p><b>Mobile:</b> {!! isset($user->mobile) ?$user->mobile : 'Not Provided'  !!}</p>
                                            <p><b>Date of Birth:</b> {!! isset($user->dob) ? $user->dob : 'Not Provided' !!}</p>
                                            <p><b>Email:</b> {!! $user->email !!}</p>
                                            <p><b>Present Address:</b> {!! isset($user->profile->present_address) ? $user->profile->present_address : 'Not Provided' !!}</p>
                                            <p><b>Parmanent Address:</b> {!! isset($user->profile->parmanent_address) ? $user->profile->parmanent_address : 'Not Provided' !!}</p>
                                            <!-- /row-->
                                        </div>
                                        <!--  End wrapper_indent -->

                                    </div>
                                    <!-- /tab_2 -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="indent_title_in1">
                                            <i class="pe-7s-news-paper"></i>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <h3>Professional Statement</h3>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#professionForm" data-toggle="tooltip" title="Add Profession"><i class="fa fa-plus-circle"> </i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p><b>Occupation:</b> {!! isset($user->profile->occupation) ? $user->profile->occupation : 'Not Provided' !!}</p>
                                            <p><b>Job Place:</b> {!! isset($user->profile->job_place) ? $user->profile->job_place : 'Not Provided' !!}</p>
                                            <p><b>Job Position:</b> {!! isset($user->profile->job_position) ? $user->profile->job_position : 'Not Provided' !!}</p>

                                        </div>
                                        <!-- End review-container -->
                                    </div>
                                    <!-- /tab_3 -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                            <!-- /tabs_styled -->
                        </div>
                        <div class="modal fade" id="educationForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 font-weight-bold">Add Degree</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{ html()->form('POST', route('notice.store'))->class('form-horizontal')->open() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            {{ html()->label('Degree Name')->class('col-md-4 form-control-label required') }}
                                            {{ html()->select('degree_name')
                                                ->class('form-control col-md-6')
                                                ->options(['' => 'Select Degree', 'S.S.C' => 'S.S.C', 'H.S.C' => 'H.S.C', 'Bachelor' => 'Bachelor', 'Masters' => 'Masters', 'Other' => 'Other'])
                                                ->placeholder('Enter Degree Name')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Institute')->class('col-md-4 form-control-label required') }}
                                            {{ html()->text('institute')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter institute')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Passing Year')->class('col-md-4 form-control-label required') }}
                                            {{ html()->text('completed_at')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter title ( Max 40 character) ')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Order')->class('col-md-4 form-control-label required') }}
                                            {{ html()->number('order')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter degree completed order ')
                                                ->required() }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
{{--                                        <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal" aria-label="Close">Close</button>--}}
                                        {{ form_submit(__('buttons.general.crud.create'))->class('btn btn-success pull-right') }}
                                    </div>
                                    {{ html()->form()->close() }}
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="professionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 font-weight-bold">Add Profession</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{ html()->form('POST', route('notice.store'))->class('form-horizontal')->open() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            {{ html()->label('Company Name')->class('col-md-4 form-control-label required') }}
                                            {{ html()->text('company_name')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter Company Name')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Designation')->class('col-md-4 form-control-label required') }}
                                            {{ html()->text('designation')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter designation')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Location')->class('col-md-4 form-control-label required') }}
                                            {{ html()->text('location')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter location ')
                                                ->required() }}
                                        </div>
                                        <br>
                                        <div class="row">
                                            {{ html()->label('Order')->class('col-md-4 form-control-label required') }}
                                            {{ html()->number('order')
                                                ->class('form-control col-md-6')
                                                ->placeholder('Enter order ')
                                                ->required() }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {{--                                        <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal" aria-label="Close">Close</button>--}}
                                        {{ form_submit(__('buttons.general.crud.create'))->class('btn btn-success pull-right') }}
                                    </div>
                                    {{ html()->form()->close() }}
                                </div>
                            </div>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('after-scripts')
    <script type="text/javascript" >

        $('.thumbnail-file').change(function () {
            readURL(this);
            $('#submit-button').show();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.thumbnail-image')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var URL = "{{ url('profile-upload') }}";
        $("#uploadimage").on('submit', (function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: URL,
                type: "POST",
                data: new FormData(this),
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#submit-button').hide();
                    $('#progress').show();
                    var progress = parseInt(100, 0);
                    $('#progress .progress-bar').css('width', progress + '%');

                    $('#progress').delay(800).queue(function(n) {
                        $(this).fadeOut(); n();
                    });
                }
            });
        }));

    </script>
@endsection