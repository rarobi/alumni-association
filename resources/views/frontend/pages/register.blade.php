@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Please registration First</h4>
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
{{--                            <h4 class="text-center">Please registration First!</h4>--}}
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <form>
                                        <div class="box_form bg-info p-10">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Your  name">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Your email address">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password1" placeholder="Your password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm password</label>
                                                <input type="password" class="form-control" id="password2" placeholder="Confirm password">
                                            </div>
                                            <div id="pass-info" class="clearfix"></div>
                                            <div class="checkbox-holder text-left">
                                                <div class="checkbox_2">
                                                    <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked>
                                                    <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                                                </div>
                                            </div>
                                            <div class="form-group text-center add_top_30">
                                                <input class="btn btn-dark" type="submit" value="Submit">
                                            </div>
                                            <div class="checkbox-holder text-left">
                                                <div class="checkbox_2">
                                                    <p class="text-center text-dark">If you are already a member? <a href="{{ url('/alumni-login') }}"><strong class="text-white">Login!</strong></a></p>
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