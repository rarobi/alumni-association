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
                <div class="col-12 col-lg-9">
                    <div class="row no-gutters">
                        <!-- Single Post Share Info -->
                        <div class="col-2 col-sm-1">
                            <div class="single-post-share-info">
                                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" class="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <h4>The Latest News of 2017</h4>
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                    By <span class="text-info"> Robiul ALam</span> ( At 08:00 A.M, March 1, 2016 )
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <h4>The best Wordpress Theme 2017</h4>
                                    <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut</p>
                                    <!-- blockquote -->
                                    <blockquote class="fancy-blockquote">
                                        <span class="quote playfair-font">“</span>
                                        <h5 class="mb-4">“If you’re going to try, go all the way. There is no other feeling like that. You will be alone with the gods, and the nights will flame with fire. You will ride life straight to perfect laughter. It’s the only good fight there is.”</h5>
                                        <h6>Aigars Silkalns - <span>CEO DeerCreative</span></h6>
                                    </blockquote>
                                    <h4>Unique Design &amp; Easy Custom</h4>
                                    <p>Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea. Liusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, qui s nostrud exercitation ullamLorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p>Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ****** Blog Sidebar ****** -->
                <div class="col-10 col-lg-3">
                    <div class="blog-sidebar">
                        <!-- Single Widget Area -->
                        <div class="single-widget-area popular-post-widget">
                            <div class="widget-title">
                                <h5>Latest Blog</h5>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post">
                                <div class="post-contents">
                                    <a href="{{ url('/blog-details') }}">
                                        <h6>In order to succeed, we must first believe that we can.</h6>
                                    </a>
                                    <a class="post-date" href="#">October 7, 2017</a>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post">
                                <div class="post-contents">
                                    <a href="{{ url('/blog-details') }}">
                                        <h6>The way to get started is to quit talking and begin doing.</h6>
                                    </a>
                                    <a class="post-date" href="#">October 7, 2017</a>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post">
                                <div class="post-contents">
                                    <a href="#">
                                        <h6>In order to succeed, we must first believe that we can.</h6>
                                    </a>
                                    <a class="post-date" href="#">October 7, 2017</a>
                                </div>
                            </div>
                            <!-- Single Popular Post -->
                            <div class="single-populer-post">
                                <div class="post-contents">
                                    <a href="#">
                                        <h6>The way to get started is to quit talking and begin doing.</h6>
                                    </a>
                                    <a class="post-date" href="#">October 7, 2017</a>
                                </div>
                            </div>
                        </div>

                        {{--<!-- Single Widget Area -->--}}
                        {{--<div class="single-widget-area categories-widget mt-5">--}}
                            {{--<div class="widget-title">--}}
                                {{--<h5>Categories</h5>--}}
                            {{--</div>--}}
                            {{--<ul>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> Branding</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> Design</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> Illustration</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> News</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> Programming</a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-circle" aria-hidden="true"></i> Trending</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<!-- Single Widget Area -->--}}
                        {{--<div class="single-widget-area tags-widget mt-5">--}}
                            {{--<div class="widget-title">--}}
                                {{--<h5>Popular Tags</h5>--}}
                            {{--</div>--}}
                            {{--<a href="#">Creative</a>--}}
                            {{--<a href="#">Unique</a>--}}
                            {{--<a href="#">Photography</a>--}}
                            {{--<a href="#">Music</a>--}}
                            {{--<a href="#">Wordpress Template</a>--}}
                            {{--<a href="#">Ideas</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection