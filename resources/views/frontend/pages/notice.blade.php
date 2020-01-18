@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">NOTICE BOARD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70">
        <div class="container">
            @if(count($notices) > 0)
            <div class="row ">
                <div class="col-12 col-lg-8">
                    <div class="blog-sidebar">
                        <!-- Single Widget Area -->
                        <div class="single-widget-area popular-post-widget">
                            <!-- Single Popular Post -->
                            @foreach($notices as $notice)
                            <div class="single-populer-post">
                                <div class="post-contents">
                                    <a href="{{ url('/latest-notice', $notice->id) }}">
                                        <h6>{!! $notice->title !!}</h6>
                                    </a>
                                    <a class="post-date" href="#"> <i class="fa fa-calendar"></i> {!!  \Carbon\Carbon::parse($notice->created_at)->format('j F Y') !!}</a>
                                </div>
                            </div>
                            @endforeach
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
            @else
            <div class="row">
                <h4 class="text-center">No Notice Available</h4>
            </div>
            @endif
        </div>
    </section>

@endsection