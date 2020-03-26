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
                                        @if($member->profile && $member->profile->image)
                                            <img src="/uploads/member_profile/{{ $member->profile->image }}"
                                                 alt="image"
                                                 class="thumbnail-image">
                                        @else
                                            <img src="/frontend/img/bg-img/dummy-profile.jpg"
                                                 alt=""
                                                 class="thumbnail-image">
                                        @endif
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
                                        @if(count($user_educations) > 0)
                                            @foreach($user_educations as $user_education)
                                                {{--                                            {!! dd($user_education) !!}--}}
                                                <hr>
                                                <div class="wrapper_indent">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p><b>Degree:</b> {!! isset($user_education->degree_name) ? $user_education->degree_name : 'Not Provided'  !!}</p>
                                                            <p><b>Institute:</b> {!! isset($user_education->institute) ? $user_education->institute : 'Not Provided'  !!}</p>
                                                            @if(!is_null($user_education->degree_name) && $user_education->degree_name == 'Bachelor')
                                                                <p><b>Batch:</b> {!! isset($member->profile->batch_id) ? $member->profile->batch_id : 'Not Provided'  !!}</p>
                                                                <p><b>Session:</b> {!! isset($member->profile->session) ? $member->profile->session : 'Not Provided' !!}</p>
                                                            @endif
                                                            <p><b>Passing Year:</b> {!! isset($user_education->completed_at) ? $user_education->completed_at : 'Not Provided' !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="wrapper_indent">
                                                <p> No Education Provieded Yet</p>
                                            </div>
                                        @endif
                                    </div>
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
                                            <p><b>Name: </b>{!! isset($member->first_name) ? $member->first_name : 'Not Provided' !!}</p>
                                            <p><b>Age: </b>{!! \Carbon\Carbon::parse($member->dob)->age !!} Years</p>
                                            <p><b>Mobile: </b>{!! isset($member->mobile) ? $member->mobile : 'Not Provided' !!}</p>
                                            <p><b>Date of Birth: </b>{!! isset($member->dob) ? $member->dob : 'Not Provided' !!}</p>
                                            <p><b>Email: </b>{!! isset($member->email) ? $member->email : 'Not Provided' !!}</p>
                                            <p><b>Blood Group:</b> {!! isset($member->blood_group) ? $member->blood_group : 'Not Provided'  !!}</p>
                                            <p><b>Occupation:</b> {!! isset($member->profile->occupation) ? $member->profile->occupation : 'Not Provided' !!}</p>
                                            <p><b>Skills:</b> {!! isset($member->profile->skills) ? $member->profile->skills : 'Not Provided' !!}</p>
                                            <p><b>Present Address: </b>@if(!is_null($member->profile))
                                                {!! isset($member->profile->present_address) ? $member->profile->present_address : 'Not Provided' !!}
                                                @else
                                                    Not Provided
                                                @endif
                                            </p>
                                            <p><b>Parmanent Address: </b>@if(!is_null($member->profile))
                                                {!! isset($member->profile->parmanent_address) ? $member->profile->parmanent_address : 'Not Provided' !!}
                                                @else
                                                    Not Provided
                                                @endif
                                            </p>
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
                                        @if(count($user_professions) > 0)
                                            @foreach($user_professions as $user_profession)
                                                <hr>
                                                <div class="wrapper_indent">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p><b>Company:</b> {!! isset($user_profession->company_name) ? $user_profession->company_name : 'Not Provided' !!}</p>
                                                            <p><b>Designation:</b> {!! isset($user_profession->designation) ? $user_profession->designation : 'Not Provided' !!}</p>
                                                            <p><b>Address:</b> {!! isset($user_profession->location) ? $user_profession->location : 'Not Provided' !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="wrapper_indent">
                                                <p> No Profession Provieded Yet</p>
                                            </div>
                                    @endif
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