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
            @if(count($members) > 0)
            <div id="posts" class="row no-gutter">
                @foreach($members as $member)
                <div class="item col-sm-2 m-b-10">
                    <article class="clearfix mb-sm-30 faculty-member-image-box">
                        @if($member && $member->image)
                        <img src="/uploads/member_profile/{{ $member->image }}"
                             alt="image"
                             class="img-responsive img-fullwidth">
                        @else
                            <img src="/frontend/img/bg-img/dummy-profile.jpg"
                                 alt=""
                                 class="img-responsive img-fullwidth">
                        @endif
                        <div class="media-body faculty-title">
                            <h6 class="text-info">{{ $member->first_name }}</h6>
                            <div class="details m-t-30">

                                <a href="{!! url('alumni', $member->user_id) !!}" class="btn fancy-btn fancy-active" style="width: 140px;height: 40px">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="row m-b-20">
{{--               {!! $members->render() !!}--}}
            </div>
            @else
            <div class="row">
                <h4 class="text-center">No Member found</h4>
            </div>
            @endif
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection