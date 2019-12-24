@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        {{--<h4 class="text-info m-t-125">BLOG Details</h4>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row no-gutters">
                        <!-- Single Post -->
                        <div class="col-12 col-sm-12">
                            <div class="single-post">
                                <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    Posted At:  <span class="text-info"> At 08:00 A.M, March 1, 2016</span> <br>
                                    Posted By <span class="text-info"> Robiul ALam</span>
                                </div>
                                <!-- Post Content -->
                                <div>
                                     <h6 class="btn btn-info">Attachment Documents</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection