@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Member List</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="site-section single_blog_area p-t-70" id="gallery-section">
        <div class="container">
            <div id="posts" class="row no-gutter">
{{--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">--}}
{{--                    <a href="frontend/img/blog-img/blog-4.jpg" class="item-wrap fancybox">--}}
{{--                        <span class="icon-search2"></span>--}}
{{--                        <img class="img-fluid" src="frontend/img/blog-img/blog-4.jpg">--}}
{{--                    </a>--}}
{{--                </div>--}}
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        <img src="https://nstu.edu.bd/uploads/avatar/KcGhSKgwLr1553895871.jpg"
                             alt=""
                             class="img-responsive img-fullwidth">

                        <div class="media-body faculty-title">
                            <h6 class="text-info">Dr. Humayun Kabir</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('member-details') !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection