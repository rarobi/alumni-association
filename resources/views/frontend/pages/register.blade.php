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
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
            <main>
                <div class="bg_color_2">
                    <div class="container margin_60_35">
                        <div id="register">
{{--                            <h4 class="text-center">Please registration First!</h4>--}}
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    {{ html()->form('POST', url('alumni-register'))->class('form-horizontal')->open() }}
                                        <div class="box_form bg-info p-10">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Your  name" required>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Batch</label>
                                                    <select type="text" name="batch_id" class="form-control" required>
                                                        <option>-- Select the batch --</option>
                                                        <option value="1">Batch-01</option>
                                                        <option value="2">Batch-02</option>
                                                        <option value="3">Batch-03</option>
                                                        <option value="4">Batch-04</option>
                                                        <option value="5">Batch-05</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Session</label>
                                                    <select type="text" name="session" class="form-control" required>
                                                        <option>-- Select the session --</option>
                                                        <option value="2007-2008">2007-2008</option>
                                                        <option value="2008-2009">2008-2009</option>
                                                        <option value="2010-2011">2010-2011</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Passing Year</label>
                                                    <select type="text"name="passing_year" class="form-control" required>
                                                        <option>-- Select the year --</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Mobile</label>
                                                    <input type="number" name="mobile" class="form-control" placeholder="Enter Your mobile" required>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Your password" required>
                                                </div>
{{--                                                <div class="form-group col-sm-6">--}}
{{--                                                    <label>Confirm password</label>--}}
{{--                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">--}}
{{--                                                </div>--}}
                                            </div>
                                                <div id="pass-info" class="clearfix"></div>
{{--                                                <div class="checkbox-holder text-left">--}}
{{--                                                    <div class="checkbox_2">--}}
{{--                                                        <input type="checkbox" value="accept_2" id="check_2" name="check_2" checked>--}}
{{--                                                        <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="form-group text-center add_top_30">
                                                    <input class="btn btn-dark" type="submit" value="Submit">
                                                </div>
                                                <div class="checkbox-holder text-left">
                                                    <div class="checkbox_2">
                                                        <p class="text-center text-dark">If you are already a member? <a href="{{ url('/alumni-login') }}"><strong class="text-white">Login!</strong></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                    {{ html()->form()->close() }}
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