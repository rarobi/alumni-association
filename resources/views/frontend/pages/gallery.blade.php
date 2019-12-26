@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">CSTE CORIDOR</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="site-section single_blog_area p-t-70" id="gallery-section">
        <div class="container">
            <div class="row justify-content-center mb-5" data-aos="fade">
                <div id="filters" class="filters text-center button-group col-md-7">
                    <button class="btn btn-primary active" data-filter="*">All</button>
                    <button class="btn btn-primary" data-filter=".web">Classes</button>
                    <button class="btn btn-primary" data-filter=".design">Intern</button>
                    <button class="btn btn-primary" data-filter=".brand">Training</button>
                </div>
            </div>

            <div id="posts" class="row no-gutter">
                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <a href="frontend/img/blog-img/blog-4.jpg" class="item-wrap fancybox">
                        <span class="icon-search2"></span>
                        <img class="img-fluid" src="frontend/img/blog-img/blog-4.jpg">
                    </a>
                </div>
                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <a href="frontend/img/bg-img/convocation.jpg" class="item-wrap fancybox">
                        <span class="icon-search2"></span>
                        <img class="img-fluid" src="frontend/img/bg-img/convocation.jpg">
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection