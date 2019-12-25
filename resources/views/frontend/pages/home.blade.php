@extends('frontend.layouts.app')

@section('content')

    <!-- ***** Hero Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <!-- Video Overview -->
                        <h2>A family of 5000+ alumni</h2>
                        <a href="{!! url('/about') !!}" class="btn fancy-btn fancy-active">About Us</a>
                        <a href="{{ url('/contact') }}" class="btn fancy-btn">Get a quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Top Feature Area Start ***** -->
    <div class="fancy-top-features-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fancy-top-features-content">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Reliabile</h5>
                                    <p>Before build up your career, first you have to make yourself as a reliable.  </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-user" aria-hidden="true"></i> Patient</h5>
                                    <p>Patience is not about how long you can wait, but how well you behave while you’re waiting. </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-diamond" aria-hidden="true"></i> Honest</h5>
                                    <p>Honesty is more than not lying. It is truth telling, truth speaking, truth living and truth loving. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Feature Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="fancy-about-us-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="about-us-text">
                        <h4>About Computer Science & Telecommunication Engineering (CSTE)</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="http://i3.ytimg.com/vi/al8y5MoCaAE/hqdefault.jpg">
                            </div>
                            <div class="col-sm-8">
                                <p>Department of CSTE in one of the four founding departments of NSTU. The department currently offers Bachelor of Science (Engineering) in CSTE and Masters of Science (Engineering) in Telecommunication Engineeing.</p>
                            </div>
                        </div>
                        <p>The department is different than other traditional Computer Science departments in the way that, courses of Communication Technology is equally emphasized along with courses of Computer Science in the curriculum..</p>
                        <a href="#" class="btn fancy-btn fancy-dark">Read More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="about-us-text">
                        <h4>Latest News</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{asset('frontend/img/bg-img/convocation.jpg')}}">
                            </div>
                            <div class="col-sm-8">
                                <br><a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">NSTU 1st Year Admission 2019-20</a></br>
                                <span>March 1, 2016</span>  |  <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/#comments">
                                    4 Comments                 </a></br>

                                NSTU 1st Year Admission 2019-20: Admission for empty seat will be held on 15th December...</p> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{asset('frontend/img/bg-img/convocation.jpg')}}">
                            </div>
                            <div class="col-sm-8">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">Allotment in Abdul Malek Ukil Hal</a></br>
                                <span>March 1, 2016</span>  |  <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/#comments">
                                    4 Comments                 </a></br>
                                Notice:Interview for Seat Allotment in Abdul Malek Ukil Hal...</p>
                            </div>
                        </div>
                        <a href="#" class="btn fancy-btn fancy-dark">All News</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Skills Area Start ***** -->
    <div class="container">
        <div class="row">
            <!-- Single Blog -->
            <div class="col-12 col-md-4">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-content">
                        <h5><a href="#">Latest Events</a></h5>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{asset('frontend/img/bg-img/convocation.jpg')}}">
                            </div>
                            <div class="col-sm-8">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">োয়াখালী-৪ আসনের ..</a></br>
                                <span>March 1, 2016</span></br>
                                নোয়াখালী-৪ আসনের মাননীয় সংসদ ....</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{asset('frontend/img/bg-img/convocation.jpg')}}">
                            </div>
                            <div class="col-sm-8">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">শিক্ষামন্ত্রী সঙ্গে নোবিপ্রবি ..</a></br>
                                <span>March 1, 2016</span></br>
                                শিক্ষামন্ত্রী সঙ্গে নোবিপ্রবি...</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{asset('frontend/img/bg-img/convocation.jpg')}}">
                            </div>
                            <div class="col-sm-8">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">শিক্ষা উপমন্ত্রীর ..</a></br>
                                <span>March 1, 2016</span></br>
                                শিক্ষা উপমন্ত্রীর সঙ্গে...</p>
                            </div>
                        </div>

                        <a href="#" class="btn fancy-btn fancy-dark">ALL EVENTS</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog -->
            <div class="col-12 col-md-4">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-content">
                        <h5><a href="#">Announcements</a></h5>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">Standard Tender Document ..</a></br>
                                Standard Tender Document (National)...</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">Expansion of Academic ..</a></br>
                                Expansion of Academic and Physical...</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="http://demos.themecycle.com/edupress-uni/getting-started-with-illustrator-cc/">Getting Started with ..</a></br>
                                It was popularised in the 1960s with...</p>
                            </div>
                        </div>

                        <a href="#" class="btn fancy-btn fancy-dark">VIEW ALL</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog -->
            <div class="col-12 col-md-4">
                <div class="single-blog-area wow fadeInUp" data-wow-delay="1.5s">
                    <div class="blog-content">
                        <h5><a href="#">Administration</a></h5>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul id="menu-home-menu" class="text-center"><li id="menu-item-961" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-961"><a href="#">How to Apply</a></li>
                                    <li id="menu-item-962" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-962"><a href="#">Plan to Visit</a></li>
                                    <li id="menu-item-963" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-963"><a href="#">Tuition &#038; Student Finance</a></li>
                                    <li id="menu-item-964" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-964"><a href="#">Loans, Grants &#038; Scholarships</a></li>
                                    <li id="menu-item-965" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-965"><a href="#">Financial Planning</a></li>
                                    <li id="menu-item-966" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-966"><a href="#">Student Jobs</a></li>
                                    <li id="menu-item-967" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-967"><a href="#">Career Planing</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- ***** Skills Area End ***** -->

    <!-- ***** Testimonials Area Start ***** -->
    <section class="fancy-testimonials-area section-padding-100 fancy-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial d-md-flex align-items-center">
                            <!-- Testimonial Thumb -->
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('frontend/img/clients-img/1.jpg') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="testimonilas-content">
                                <span class="playfair-font quote">“</span>
                                <h5>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</h5>
                                <h6>Aigars Silkalns - <span>CEO DeerCreative</span></h6>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial d-md-flex align-items-center">
                            <!-- Testimonial Thumb -->
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('frontend/img/clients-img/1.jpg') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="testimonilas-content">
                                <span class="playfair-font quote">“</span>
                                <h5>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</h5>
                                <h6>Aigars Silkalns - <span>CEO DeerCreative</span></h6>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial d-md-flex align-items-center">
                            <!-- Testimonial Thumb -->
                            <div class="testimonial-thumbnail">
                                <img src="{{ asset('frontend/img/clients-img/1.jpg') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="testimonilas-content">
                                <span class="playfair-font quote">“</span>
                                <h5>I wanted to mention that these days, when the opposite of good customer and tech support tends to be the norm, it’s always great having a team like you guys at Fancy! So, be sure that I’ll always spread the word about how good your product is and the extraordinary level of support that you provide any time there is any need for it.</h5>
                                <h6>Aigars Silkalns - <span>CEO DeerCreative</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="fancy-blog-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Our Campus Life</h2>
                        <p>Present is valuable but past is gold</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('frontend/img/blog-img/blog-1.jpg') }}" alt="">
                        <div class="blog-content">
                            <h5><a href="#">Study</a></h5>
                            <p>The CSTE that recognize the talent and effort of the best web designers, developers and agencies in the world.</p>
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="1s">
                        <img src="{{ asset('frontend/img/blog-img/blog-2.jpg') }}" alt="">
                        <div class="blog-content">
                            <h5><a href="#">Assignment</a></h5>
                            <p>The CSTE that recognize the talent and effort of the best web designers, developers and agencies in the world.</p>
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{ asset('frontend/img/blog-img/blog-3.jpg') }}" alt="">
                        <div class="blog-content">
                            <h5><a href="#">Workplace</a></h5>
                            <p>The CSTE that recognize the talent and effort of the best web designers, developers and agencies in the world.</p>
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->
@endsection