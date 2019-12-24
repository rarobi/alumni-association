@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Elected Members</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row">
                <div class="accordion elected-members">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="head-img">
                                    <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="head-cont">
                                    <h3>MOHAMMAD BABUL MIAH</h3>
                                    <p>Company Secretary & Founder Shareholder</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="accordion elected-members">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="head-img">
                                    <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="head-cont">
                                    <h3>MOHAMMAD BABUL MIAH</h3>
                                    <p>Company Secretary & Founder Shareholder</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="accordion elected-members">
                    <div class="heading">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="head-img">
                                    <img src="frontend/img/blog-img/blog-4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="head-cont">
                                    <h3>MOHAMMAD BABUL MIAH</h3>
                                    <p>Company Secretary & Founder Shareholder</p>
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