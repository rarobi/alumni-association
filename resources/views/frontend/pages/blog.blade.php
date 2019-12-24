@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">LATEST BLOG</h4>
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
                <div class="col-12 col-lg-12 row">
                    <div class="col-lg-6 m-b-10">
                        <div class="row no-gutters">
                            <!-- Single Post -->
                            <a href="{{ url('/blog-details') }}">
                            <div class="col-12 col-sm-12 card">
                                <div class="single-post row card-body">
                                    <!-- Post Thumb -->
                                    <div class="col-sm-5">
                                        <div class="post-thumb">
                                            <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                        </div>
                                    </div>
                                    <!-- Post Content -->
                                    <div class="col-sm-7">
                                        <div class="post-content">
                                            <h6>The best Wordpress Theme 2017</h6>
                                                At <span class="text-info"> 08:00 A.M, March 1, 2016</span><br>
                                                By <span class="text-info"> Robiul ALam </span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Tiusmod tempor incididunt ut labore et dolore magna . Tiusmod tempor incididunt ut labore et dolore magna..<br>

                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b-10">
                        <div class="row no-gutters">
                            <!-- Single Post -->
                            <a href="{{ url('/blog-details') }}">
                                <div class="col-12 col-sm-12 card">
                                    <div class="single-post row card-body">
                                        <!-- Post Thumb -->
                                        <div class="col-sm-5">
                                            <div class="post-thumb">
                                                <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- Post Content -->
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <h6>The best Wordpress Theme 2017</h6>
                                                At <span class="text-info"> 08:00 A.M, March 1, 2016</span><br>
                                                By <span class="text-info"> Robiul ALam </span>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Tiusmod tempor incididunt ut labore et dolore magna . Tiusmod tempor incididunt ut labore et dolore magna..<br>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b-10">
                        <div class="row no-gutters">
                            <!-- Single Post -->
                            <a href="{{ url('/blog-details') }}">
                                <div class="col-12 col-sm-12 card">
                                    <div class="single-post row card-body">
                                        <!-- Post Thumb -->
                                        <div class="col-sm-5">
                                            <div class="post-thumb">
                                                <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- Post Content -->
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <h6>The best Wordpress Theme 2017</h6>
                                                At <span class="text-info"> 08:00 A.M, March 1, 2016</span><br>
                                                By <span class="text-info"> Robiul ALam </span>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Tiusmod tempor incididunt ut labore et dolore magna . Tiusmod tempor incididunt ut labore et dolore magna..<br>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b-10">
                        <div class="row no-gutters">
                            <!-- Single Post -->
                            <a href="{{ url('/blog-details') }}">
                                <div class="col-12 col-sm-12 card">
                                    <div class="single-post row card-body">
                                        <!-- Post Thumb -->
                                        <div class="col-sm-5">
                                            <div class="post-thumb">
                                                <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                            </div>
                                        </div>
                                        <!-- Post Content -->
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <h6>The best Wordpress Theme 2017</h6>
                                                At <span class="text-info"> 08:00 A.M, March 1, 2016</span><br>
                                                By <span class="text-info"> Robiul ALam </span>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Tiusmod tempor incididunt ut labore et dolore magna . Tiusmod tempor incididunt ut labore et dolore magna..<br>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection