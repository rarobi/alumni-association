@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">ABOUT CSTE</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="bg-gray p-t-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="about-us-text">
                        <div class="row">
                            <div class="col-sm-12">
                                <p><span class="text-info">Department of Computer Science and Telecommunication Engineering</span> in one of the four founding departments of Noakhali Science and Technology University.
                                    The department currently offers Bachelor of Science (Engineering) in CSTE and Masters of Science (Engineering) in Telecommunication Engineeing.
                                    The department is different than other traditional Computer Science departments in the way that,
                                    courses of Communication Technology is equally emphasized along with courses of Computer Science in the curriculum.
                                </p>
                            </div>
                            <div class="col-sm-12">
                                <iframe  class="col-sm-12" height="315" src="https://www.youtube.com/embed/al8y5MoCaAE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <p>The department has highly qualified faculty members and is equipped with state of the art Computer, Electronics and Communication Labs.
                            Different occasions are celebrated with a great festivity. Teachers and students of this department are very united. </div>
                </div>
            </div>
        </div>
    </section>
@endsection