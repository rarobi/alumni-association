@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Please login here!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70 m-b-20">
        <div class="container">
            <main>
                <div class="bg_color_2">
                    <div class="container margin_60_35">
                        <div id="register">
{{--                            <h4 class="text-center">Please relogin here!</h4>--}}
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <form action="{{ url('/profile') }}">
                                        <div class="box_form bg-info p-10">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Your email address">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password1" placeholder="Your password">
                                            </div>
                                            <div id="pass-info" class="clearfix"></div>
                                            <div class="form-group text-center add_top_30">
                                                <input class="btn btn-dark" type="submit" value="Login">
                                            </div>

                                            <div class="checkbox-holder text-left">
                                                <div class="checkbox_2">
                                                    <p class="text-center text-dark">Do not have an account yet? <a href="{{ url('/alumni-register') }}"><strong class="text-white">Register now!</strong></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /register -->
                    </div>
                </div>
            </main>
        </div>
    </section>

@endsection