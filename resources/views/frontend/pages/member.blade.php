@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">CSTE MEMBERS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 m-b-15">
                    <div class="center member-box">
                        <a href="{{ url('/member-list') }}">
                            <div class="img-thumbnail image" >
                                <h4 class="text-center">Batch: 06 (2010-11) </h4>
                                <img class="album-img" width="100%" src="{{asset('frontend/img/bg-img/convocation.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 m-b-15">
                    <div class="center  member-box">
                        <a href="{{ url('/member-list') }}">
                            <div class="img-thumbnail image" >
                                <h4 class="text-center">Batch: 07 (2011-12) </h4>
                                <img class="album-img" width="100%" src="{{asset('frontend/img/bg-img/convocation.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4 m-b-15">
                    <div class="center  member-box">
                        <a href="{{ url('/member-list') }}">
                            <div class="img-thumbnail image" >
                                <h4 class="text-center">Batch: 08 (2012-13) </h4>
                                <img class="album-img" width="100%" src="{{asset('frontend/img/bg-img/convocation.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection