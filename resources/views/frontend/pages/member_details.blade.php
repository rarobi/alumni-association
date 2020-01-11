@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">MEMBER DETAILS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4" id="sidebar">
                            <div class="box_profile p-t-20 p-l-0 p-r-0 p-b-0">
                                <form id="uploadimage" method="post"  enctype="multipart/form-data">
                                    <figure>
{{--                                        @if(!is_null($user->profile) && !is_null($user->profile->image))--}}
{{--                                            <img class="thumbnail-image" src="/uploads/member_profile/{{ $user->profile->image }}" alt="" style="height:190px">--}}
{{--                                        @else--}}
{{--                                            <img class="thumbnail-image" src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height:190px">--}}
{{--                                        @endif--}}
                                            <img class="thumbnail-image" src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg" alt="" style="height:190px">
                                    </figure>
                                </form>
                            </div>
                        </aside>
                        <!-- /asdide -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="tabs_styled_2 m-b-20">
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
                                        <div class="indent_title_in">
                                            <i class="pe-7s-news-paper"></i>
                                            <h3>Educational Statement</h3>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p><b>Institute:</b> Noakhali Science & Technology University</p>
                                            <p><b>Department:</b> CSTE</p>
{{--                                            <p><b>Batch:</b> {!! isset($user->profile->batch_id) ? $user->profile->batch_id : 'Not Provided'  !!}</p>--}}
                                            <p><b>Batch:</b> Not Provided</p>
{{--                                            <p><b>Session:</b> {!! isset($user->profile->session) ? $user->profile->session : 'Not Provided' !!}</p>--}}
                                            <p><b>Session:</b>Not Provided</p>

                                        </div> </div>
                                    <!-- /tab_1 -->
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div class="indent_title_in1">
                                            <i class="pe-7s-user"></i>
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <h3>Personal Statement</h3>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="wrapper_indent">
                                            <p><b>Name:</b> Not Provided</p>
                                            <p><b>Age:</b> Not Provided</p>
                                            <p><b>Mobile:</b> Not Provided</p>
                                            <p><b>Date of Birth:</b> Not Provided</p>
                                            <p><b>Email:</b> Not Provided</p>
                                            <p><b>Present Address:</b> Not Provided</p>
                                            <p><b>Parmanent Address:</b>Not Provided</p>
                                            <!-- /row-->
                                        </div>
                                        <!--  End wrapper_indent -->

                                    </div>
                                    <!-- /tab_2 -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="indent_title_in">
                                            <i class="pe-7s-news-paper"></i>
                                            <h3>Professional Statement</h3>
                                        </div>
                                        <div class="wrapper_indent">
{{--                                            <p><b>Occupation:</b> {!! isset($user->profile->occupation) ? $user->profile->occupation : 'Not Provided' !!}</p>--}}
                                            <p><b>Occupation:</b> Not Provided</p>
{{--                                            <p><b>Job Place:</b> {!! isset($user->profile->job_place) ? $user->profile->job_place : 'Not Provided' !!}</p>--}}
                                            <p><b>Job Place:</b> Not Provided</p>
{{--                                            <p><b>Job Position:</b> {!! isset($user->profile->job_position) ? $user->profile->job_position : 'Not Provided' !!}</p>--}}
                                            <p><b>Job Position:</b> Not Provided</p>

                                        </div>
                                        <!-- End review-container -->
                                    </div>
                                    <!-- /tab_3 -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                            <!-- /tabs_styled -->
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection